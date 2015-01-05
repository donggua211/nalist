<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Filter_model extends MY_Model {

	public function __construct() {
		parent::__construct();
	}
	
	public function add($data) {
		$fields['category_id'] = $data['category_id'];
		$fields['filter_key'] = $data['filter_key'];
		$fields['filter_name'] = $data['filter_name'];
		$fields['type'] = $data['type'];
		$fields['add_time'] = date('Y-m-d H:i:s');
		
		if($this->db->insert('filters', $fields)) {
			return $this->db->insert_id();
		} else {
			return false;
		}
	}
	
	public function update($id, $update_field = array()) {
		if(empty($update_field)) {
			return true;
		}
		
		$this->db->where('id', $id);
		if($this->db->update('filters', $update_field)) {
			return true;
		} else {
			return false;
		}
	}
	
	public function all() {
		$sql = "SELECT filters.*, categories.category_name FROM {$this->db->dbprefix('filters')} as filters
				LEFT JOIN {$this->db->dbprefix('categories')} as categories ON categories.id = filters.category_id
				ORDER BY filters.add_time DESC";
		$query = $this->db->query($sql);
		
		$filter_list = array();
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $val) {
				$filter_list[$val['id']] = $val;
			}
		}
		
		return $filter_list;
	}
	
	public function one($id) {
		$sql = "SELECT * FROM {$this->db->dbprefix('filters')}
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
		if($this->db->delete('filters', array('id' => $id))) {
			 $this->db->delete('filter_options', array('filter_id' => $id));
			return true;
		} else {
			return false;
		}
	}
}
?>