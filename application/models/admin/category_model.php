<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends MY_Model {

	var $cache_key = 'category_list';
	
	public function __construct() {
		parent::__construct();
		
		
	}
	
	public function add($data) {
		$fields['category_name'] = $data['category_name'];
		$fields['category_slug'] = $data['category_slug'];
		$fields['description'] = $data['description'];
		$fields['parent_id'] = $data['parent_id'];
		$fields['add_time'] = date('Y-m-d H:i:s');
		
		if($this->db->insert('categories', $fields)) {
			$this->category_cache_update();
			
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
		
		if($this->db->update('categories', $update_field)) {
			$this->category_cache_update();
			
			return true;
		} else {
			return false;
		}
	}
	
	private function category_cache_update() {
		$sql = "SELECT * FROM {$this->db->dbprefix('categories')}
				ORDER BY parent_id ASC";
		$query = $this->db->query($sql);
		
		$category_list = array();
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $val) {
				$category_list[$val['id']] = $val;
			}
			
			$category_list = array_2_tree($category_list);
		}
		
		$this->cache_update($category_list);
		return $category_list;
	}
	
	public function tree() {
		//Get frin Cache first.
		$category_list = $this->cache_get();
		
		if(empty($category_list)) {
			$category_list = $this->category_cache_update();
		}
		
		return $category_list;
	}
	
	public function one($id) {
		$sql = "SELECT * FROM {$this->db->dbprefix('categories')}
				WHERE id = '$id'
				LIMIT 1";
		$query = $this->db->query($sql);
		
		if ($query->num_rows() > 0) {
			return $query->row_array();
		} else {
			return false;
		}
	}
	
	public function remove($id) {
		$this->_deep_remove($id);
		$this->category_cache_update();
		return true;
	}
	
	public function _deep_remove($id) {
		//Delete
		$this->db->delete('categories', array('id' => $id)); 
		
		//Check children
		$sql = "SELECT * FROM {$this->db->dbprefix('categories')}
				WHERE parent_id = '$id'";
		$query = $this->db->query($sql);
		
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $val) {
				$this->_deep_remove($val['id']);
			}
		}
		
		return true;
	}
}
?>