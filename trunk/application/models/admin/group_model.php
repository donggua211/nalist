<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group_model extends MY_Model {

	public function __construct() {
		parent::__construct();
	}
	
	public function add($data) {
		$fields['group_name'] = $data['group_name'];
		$fields['permission'] = $data['permission'];
		$fields['add_time'] = date('Y-m-d H:i:s');
		
		if($this->db->insert('groups', $fields)) {
			return true;
		} else {
			return false;
		}
	}
	
	public function update($id, $update_field = array()) {
		if(empty($update_field)) {
			return true;
		}
		
		$this->db->where('id', $id);
		if($this->db->update('groups', $update_field)) {
			return true;
		} else {
			return false;
		}
	}
	
	public function all() {
		$sql = "SELECT * FROM {$this->db->dbprefix('groups')}
				ORDER BY add_time DESC";
		$query = $this->db->query($sql);
		
		$group_list = array();
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $val) {
				$group_list[$val['id']] = $val;
			}
		}
		
		return $group_list;
	}
	
	public function one($id) {
		$sql = "SELECT * FROM {$this->db->dbprefix('groups')}
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
		return $this->db->delete('groups', array('id' => $id)); 
	}
}
?>