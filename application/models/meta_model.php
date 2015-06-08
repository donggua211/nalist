<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meta_model extends MY_Model {

	public function __construct() {
		parent::__construct();
	}
	
	public function add($data) {
		$fields['category_id'] = $data['category_id'];
		$fields['meta_slug'] = $data['meta_slug'];
		$fields['meta_name'] = $data['meta_name'];
		$fields['display_order'] = $data['display_order'];
		$fields['add_time'] = date('Y-m-d H:i:s');
		
		if($this->db->insert('meta', $fields)) {
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
		if($this->db->update('meta', $update_field)) {
			return true;
		} else {
			return false;
		}
	}
	
	public function all() {
		$sql = "SELECT meta.*, categories.category_name FROM {$this->db->dbprefix('meta')} as meta
				LEFT JOIN {$this->db->dbprefix('categories')} as categories ON categories.id = meta.category_id
				ORDER BY meta.display_order";
		$query = $this->db->query($sql);
		
		$meta_list = array();
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $val) {
				$meta_list[$val['id']] = $val;
			}
		}
		
		return $meta_list;
	}
	
	public function one($id) {
		$sql = "SELECT * FROM {$this->db->dbprefix('meta')}
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
		if($this->db->delete('meta', array('id' => $id))) {
			return true;
		} else {
			return false;
		}
	}
	
	public function get_meta_by_categories($context_parent_id) {
		if(empty($context_parent_id)) {
			return array();
		}
		
		$sql = "SELECT * FROM {$this->db->dbprefix('meta')} as meta
				WHERE category_id IN ($context_parent_id) 
				ORDER BY meta.display_order";
		$query = $this->db->query($sql);
		
		$meta_list = array();
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $val) {
				$meta_list[$val['id']] = $val;
			}
		}
		
		return $meta_list;
	}
}
?>