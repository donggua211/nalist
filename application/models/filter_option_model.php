<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filter_option_model extends MY_Model {

	public function __construct() {
		parent::__construct();
	}
	
	public function add($data) {
		$fields['filter_id'] = $data['filter_id'];
		$fields['option_name'] = $data['option_name'];
		$fields['option_value'] = $data['option_value'];
		$fields['display_order'] = $data['display_order'];
		$fields['add_time'] = date('Y-m-d H:i:s');
		
		if($this->db->insert('filter_options', $fields)) {
			return true;
		} else {
			return false;
		}
	}
	
	public function update($option_id, $update_field = array()) {
		if(empty($update_field)) {
			return true;
		}
		
		$this->db->where('option_id', $option_id);
		if($this->db->update('filter_options', $update_field)) {
			return true;
		} else {
			return false;
		}
	}
	
	public function getby_filter($filter_id) {
		$sql = "SELECT * FROM {$this->db->dbprefix('filter_options')} as filter_options
				WHERE filter_id = '$filter_id'
				ORDER BY display_order";
		$query = $this->db->query($sql);
		
		$option_list = array();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return array();
		}
	}
	
	public function one($option_id) {
		$sql = "SELECT * FROM {$this->db->dbprefix('filter_options')}
				WHERE option_id = '$option_id'
				LIMIT 1";
		$query = $this->db->query($sql);
		
		if ($query->num_rows() > 0) {
			return $query->row_array();
		} else {
			return array();
		}
	}
	
	public function remove($option_id) {
		return $this->db->delete('filter_options', array('option_id' => $option_id));
	}
}
?>