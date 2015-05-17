<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends TREE_Model {
	var $cache_key = 'category_list';
	var $table = 'categories';
	var $slug_key	= 'category_slug';
	
	public function __construct() {
		parent::__construct();
	}
	
	public function check_slug($slug) {
		return parent::check_slug($slug, 'category_slug');
	}
	
	public function add($data) {
		$fields['category_name'] = $data['category_name'];
		$fields['category_display_name'] = $data['category_display_name'];
		$fields['category_slug'] = $data['category_slug'];
		$fields['description'] = $data['description'];
		$fields['parent_id'] = $data['parent_id'];
		$fields['display_order'] = $data['display_order'];
		$fields['add_time'] = date('Y-m-d H:i:s');
		
		if($this->db->insert('categories', $fields)) {
			$this->cache_update();
			
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
			$this->cache_update();
			
			return true;
		} else {
			return false;
		}
	}
	
	public function one($id) {		
		$sql = "SELECT * FROM {$this->db->dbprefix('categories')}
				WHERE id = '$id'
				LIMIT 1";
		$query = $this->db->query($sql);
		
		if ($query->num_rows() > 0) {
			return $query->row_array();
		} else {
			return array();
		}
	}
	
	public function check_slug_exist($category_slug, $skip_id = '') {
		$sql = "SELECT * FROM {$this->db->dbprefix('categories')}
				WHERE category_slug = '$category_slug' ";
		if(!empty($skip_id)) {
			$sql .= " AND id != '$skip_id' ";
		}
		$sql .= " LIMIT 1";
		$query = $this->db->query($sql);
		return ($query->num_rows() > 0) ? TRUE :FALSE;
	}
}
?>