<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info_model extends MY_Model {

	public function __construct() {
		parent::__construct();
	}
	
	public function add($data) {
		$fields['area_id'] = $data['area_id'];
		$fields['category_id'] = $data['category_id'];
		$fields['user_id'] = $data['user_id'];
		$fields['title'] = $data['title'];
		$fields['description'] = $data['description'];
		$fields['filters'] = $data['filters'];
		$fields['status'] = $data['status'];
		$fields['add_time'] = date('Y-m-d H:i:s');
		$fields['update_time'] = date('Y-m-d H:i:s');
		
		if($this->db->insert('info', $fields)) {
			return $this->db->insert_id();
		} else {
			return false;
		}
	}
	
	public function update($id, $update_field = array()) {
		if(empty($update_field)) {
			return true;
		}
		
		$update_field['update_time'] = date('Y-m-d H:i:s');
		$this->db->where('id', $id);
		if($this->db->update('info', $update_field)) {
			return true;
		} else {
			return false;
		}
	}
	
	public function all() {
		$sql = "SELECT info.*, categories.category_name, areas.area_name, users.user_name FROM {$this->db->dbprefix('info')} as info
				LEFT JOIN {$this->db->dbprefix('users')} as users ON users.id = info.user_id
				LEFT JOIN {$this->db->dbprefix('areas')} as areas ON areas.id = info.area_id
				LEFT JOIN {$this->db->dbprefix('categories')} as categories ON categories.id = info.category_id
				ORDER BY info.add_time DESC";
		$query = $this->db->query($sql);
		
		$info_list = array();
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $val) {
				$info_list[$val['id']] = $val;
			}
		}
		
		return $info_list;
	}
	
	public function one($id) {
		$sql = "SELECT * FROM {$this->db->dbprefix('info')}
				WHERE id = '$id'
				LIMIT 1";
		$query = $this->db->query($sql);
		
		if ($query->num_rows() > 0) {
			$info_result = $query->row_array();
			
			$filters = array();
			$tmp_filter = explode(';', $info_result['filters']);
			foreach($tmp_filter as $value) {
				list($filter_id, $tmp_value) = explode('-', $value);
				$tmp_value = explode(',', $tmp_value);
				$filters[$filter_id] = count($tmp_value) > 1 ? $tmp_value : $tmp_value[0];
			}
			$info_result['filters'] = $filters;
			
			//Get meta info
			$sql = "SELECT * FROM {$this->db->dbprefix('info_meta')} as info_meta
					WHERE info_id = '$id'";
			$query = $this->db->query($sql);
			
			if ($query->num_rows() > 0) {
				$meta_result = $query->result_array();
				foreach($meta_result as $val) {
					$info_result['meta'][$val['meta_id']] = $val['meta_value'];
				}
			} else {
				$info_result['meta'] = array();
			}
			
			return $info_result;
		} else {
			return array();
		}
	}
	
	public function remove($id) {
		if($this->db->delete('info', array('id' => $id))) {
			 $this->db->delete('info_meta', array('info_id' => $id));
			return true;
		} else {
			return false;
		}
	}
	
	public function update_insert_info_meta($info_id, $meta_id, $value) {
		$sql = "SELECT id FROM {$this->db->dbprefix('info_meta')} as info_meta
				WHERE info_id = '$info_id'
				AND meta_id = '$meta_id'
				LIMIT 1";
		$query = $this->db->query($sql);
		
		if ($query->num_rows() == 0) {
			$insert_field = array();
			$insert_field['info_id'] = $info_id;
			$insert_field['meta_id'] = $meta_id;
			$insert_field['meta_value'] = $value;
			return $this->db->insert('info_meta', $insert_field);
		} else {
			$update_field = $where= array();
			$update_field['meta_value'] = $value;
			
			$where['info_id'] = $info_id;
			$where['meta_id'] = $meta_id;
			return $this->db->update('info_meta', $update_field, $where);
		}
	}
	
	function get_info($filter, $type = 'result', $field = '*', $row_count = 0, $offset = 0, $order_by = '') {
		$where = '';
		if (isset($filter['keyword']) && $filter['keyword'] != '') {
			$where.=" AND ((title like '%{$filter['keyword']}%') OR (description like '%{$filter['keyword']}%'))";
		}
		if (isset($filter['filter_options']) && !empty($filter['filter_options'])) {
			foreach($filter['filter_options'] as $option) {
				$where.=" AND filters like '%{$option}%'";
			}
		}
		
		if($type == 'count') {
			$field = "COUNT(*) as total";
		}
		
		$sql = "SELECT ".$field."  FROM {$this->db->dbprefix('info')} as info ";
	
		if(!empty($where)) {
			$sql .= substr_replace($where, ' WHERE ', 0, strpos($where, 'AND') + 3);
		}
		if(!empty($order_by)) {
			$sql .= " ORDER BY $order_by ";
		}
		if ($type != 'count' AND !empty($row_count)) {
			$sql .= " LIMIT $offset, $row_count";
		}
		
		$query = $this->db->query($sql);
		if($type == 'count') {
			$result = $query->row_array();
			return $result['total'];
		}
		else {
			if ($query->num_rows() > 0) {
				return $query->result_array();
			} else {
				return array();
			}
			
		}
	}
}
?>