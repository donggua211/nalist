<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Area_model extends TREE_Model {

	var $cache_key	= 'area_list';
	var $table		= 'areas';
	var $slug_key	= 'area_slug';
	
	public function __construct() {
		parent::__construct();
	}
	
	public function check_slug($slug) {
		return parent::check_slug($slug, 'area_slug');
	}
	
	/* Back end Functions */
	public function add($data) {
		$fields['area_name'] = $data['area_name'];
		$fields['area_display_name'] = $data['area_display_name'];
		$fields['area_slug'] = $data['area_slug'];
		$fields['type'] = $data['type'];
		$fields['parent_id'] = $data['parent_id'];
		$fields['display_order'] = $data['display_order'];
		
		if($this->db->insert('areas', $fields)) {
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
		
		if($this->db->update('areas', $update_field)) {
			$this->cache_update();
			
			return true;
		} else {
			return false;
		}
	}
	
	public function one($id) {
		$sql = "SELECT * FROM {$this->db->dbprefix('areas')}
				WHERE id = '$id'
				LIMIT 1";
		$query = $this->db->query($sql);
		
		if ($query->num_rows() > 0) {
			return $query->row_array();
		} else {
			return array();
		}
	}
	
	public function check_slug_exist($area_slug, $skip_id = 0) {
		$sql = "SELECT * FROM {$this->db->dbprefix('areas')}
				WHERE area_slug = '$area_slug' ";
		if(!empty($skip_id)) {
			$sql .= " AND id != '$skip_id' ";
		}
		$sql .= "LIMIT 1";
		$query = $this->db->query($sql);
		return ($query->num_rows() > 0) ? TRUE :FALSE;
	}
}
?>