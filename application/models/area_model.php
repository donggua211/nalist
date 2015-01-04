<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Area_model extends MY_Model {

	var $cache_key = 'area_list';
	
	public function __construct() {
		parent::__construct();
	}
	
	public function add($data) {
		$fields['area_name'] = $data['area_name'];
		$fields['area_slug'] = $data['area_slug'];
		$fields['type'] = $data['type'];
		$fields['parent_id'] = $data['parent_id'];
		$fields['display_order'] = $data['display_order'];
		
		if($this->db->insert('areas', $fields)) {
			$this->area_cache_update();
			
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
			$this->area_cache_update();
			
			return true;
		} else {
			return false;
		}
	}
	
	private function area_cache_update() {
		$sql = "SELECT * FROM {$this->db->dbprefix('areas')}
				ORDER BY parent_id ASC";
		$query = $this->db->query($sql);
		
		$area_list = array();
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $val) {
				$area_list[$val['id']] = $val;
			}
			
			$area_list = array_2_tree($area_list);
		}
		
		$this->cache_update($area_list);
		return $area_list;
	}
	
	public function tree() {
		//Get frin Cache first.
		$area_list = $this->cache_get();
		
		if(empty($area_list)) {
			$area_list = $this->area_cache_update();
		}
		
		return $area_list;
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
	
	public function remove($id) {
		$this->_deep_remove($id);
		$this->area_cache_update();
		return true;
	}
	
	public function _deep_remove($id) {
		//Delete
		$this->db->delete('areas', array('id' => $id)); 
		
		//Check children
		$sql = "SELECT * FROM {$this->db->dbprefix('areas')}
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