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
		$fields['status'] = $data['status'];
		$fields['add_time'] = date('Y-m-d H:i:s');
		$fields['update_date'] = date('Y-m-d H:i:s');
		
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
		
		$update_field['update_date'] = date('Y-m-d H:i:s');
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
			
			//Get filter info
			$sql = "SELECT * FROM {$this->db->dbprefix('info_filters')} as info_filters
					WHERE info_id = '$id'";
			$query = $this->db->query($sql);
			
			if ($query->num_rows() > 0) {
				$filter_result = $query->result_array();
				foreach($filter_result as $val) {
					$info_result['filter'][$val['filter_id']] = $val['value'];
				}
			} else {
				$info_result['filter'] = array();
			}
			
			return $info_result;
		} else {
			return array();
		}
	}
	
	public function remove($id) {
		if($this->db->delete('info', array('id' => $id))) {
			 $this->db->delete('info_filters', array('info_id' => $id));
			return true;
		} else {
			return false;
		}
	}
	
	public function update_insert_info_filters($info_id, $filter_id, $value) {
		$sql = "SELECT id FROM {$this->db->dbprefix('info_filters')} as info_filters
				WHERE info_id = '$info_id'
				AND filter_id = '$filter_id'
				LIMIT 1";
		$query = $this->db->query($sql);
		
		if(is_array($value)) {
			$value = implode(',', $value);
		}
		
		if ($query->num_rows() == 0) {
			$insert_field = array();
			$insert_field['info_id'] = $info_id;
			$insert_field['filter_id'] = $filter_id;
			$insert_field['value'] = $value;
			return $this->db->insert('info_filters', $insert_field);
		} else {
			$update_field = $where= array();
			$update_field['value'] = $value;
			
			$where['info_id'] = $info_id;
			$where['filter_id'] = $filter_id;
			return $this->db->update('info_filters', $update_field, $where);
		}
	}
}
?>