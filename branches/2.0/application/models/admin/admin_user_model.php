<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_user_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	
	public function check_login($user_name, $password) {
		$sql = "SELECT id, password FROM {$this->db->dbprefix('admin_users')}
				WHERE user_name  = '$user_name'
				LIMIT 1 ";
		$query = $this->db->query($sql);
		
		if ($query->num_rows() > 0) {
			$result = $query->row_array();
			if(md5($password) != $result['password']) {
				return 0;
			} else {
				return $result['id'];
			}
		} else 	{
			return -1;
		}
	}
	
	public function check_password($id, $password) {
		$sql = "SELECT id, password FROM {$this->db->dbprefix('admin_users')}
				WHERE id  = '$id'
				AND password = '".md5($password)."'
				LIMIT 1 ";
		$query = $this->db->query($sql);
		
		return $query->num_rows() > 0 ? TRUE : FALSE;
	}
	
	public function update($id, $update_field = array()) {
		if(empty($update_field)) {
			return true;
		}
		
		$this->db->where('id', $id);
		
		if($this->db->update('admin_users', $update_field)) {
			return true;
		} else {
			return false;
		}
	}
}