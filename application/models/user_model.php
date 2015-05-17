<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends MY_Model {

	public function __construct() {
		parent::__construct();	
	}
	
	public function add($data) {
		$fields['group_id'] = $data['group_id'];
		$fields['user_name'] = $data['user_name'];
		$fields['password'] = md5($data['password']);
		$fields['email'] = $data['email'];
		$fields['add_time'] = date('Y-m-d H:i:s');
		$fields['modified_time'] = date('Y-m-d H:i:s');
		
		if($this->db->insert('users', $fields)) {
			return true;
		} else {
			return false;
		}
	}
	
	public function update($id, $update_field = array()) {
		if(empty($update_field)) {
			return true;
		}
		
		$update_field['modified_time'] = date('Y-m-d H:i:s');
		
		$this->db->where('id', $id);
		if($this->db->update('users', $update_field)) {
			return true;
		} else {
			return false;
		}
	}
	
	public function all() {
		$sql = "SELECT users.*, groups.group_name, groups.permission FROM {$this->db->dbprefix('users')} as users
				LEFT JOIN {$this->db->dbprefix('groups')} as groups ON groups.id = users.group_id
				ORDER BY add_time DESC";
		$query = $this->db->query($sql);
		
		$user_list = array();
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $val) {
				$user_list[$val['id']] = $val;
			}
		}
		
		return $user_list;
	}
	
	public function one($id) {
		$sql = "SELECT users.*, groups.group_name, groups.permission FROM {$this->db->dbprefix('users')} as users
				LEFT JOIN {$this->db->dbprefix('groups')} as groups ON groups.id = users.group_id
				WHERE users.id = '$id'
				LIMIT 1";
		$query = $this->db->query($sql);
		
		if ($query->num_rows() > 0) {
			return $query->row_array();
		} else {
			return array();
		}
	}
	
	public function remove($id) {
		return $this->db->delete('users', array('id' => $id)); 
	}
}
?>