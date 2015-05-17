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
			return $query->row_array();
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
}
?>