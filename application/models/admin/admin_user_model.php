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
}