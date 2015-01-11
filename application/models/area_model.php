<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Area_model extends MY_Model {

	var $cache_key = 'area_list';
	
	public $route_conf_file = '';
	
	public static $area_list = array();
	
	public $city_slug = array();
	
	public function __construct() {
		parent::__construct();
		
		$this->route_conf_file = FCPATH.'.area_route';
		
		//Get frin Cache first.
		self::$area_list = $this->cache_get();
		
		if(empty(self::$area_list)) {
			self::$area_list = $this->area_cache_update();
		}
	}
	
	/* Front end functions */
	public function check_city($city_slug) {
		if(empty($city_slug)) {
			return false;
		}
		
		if(empty($this->city_slug)) {
			$this->city_slug = $this->_deep_get_city_slug(self::$area_list['tree']);
		}
		
		return in_array($city_slug, $this->city_slug);
	}
	
	private function _deep_get_city_slug($area_list, $city_slug = array()) {
		foreach($area_list as $val) {
			$city_slug[] = $val['area_slug'];
			
			if(isset($val['children']) && is_array($val['children'])) {
				$city_slug = $this->_deep_get_city_slug($val['children'], $city_slug);
			}
		}
		
		return $city_slug;
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
			$this->on_update();
			
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
			$this->on_update();
			
			return true;
		} else {
			return false;
		}
	}
	
	public function tree() {
		return self::$area_list['tree'];
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
	
	public function get_one_by_slug($city_slug) {
		return (self::$area_list['nav'][$city_slug]);
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
	
	public function remove($id) {
		$this->_deep_remove($id);
		$this->on_update();
		
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
	
	
	private function on_update() {
		$this->area_cache_update();
	}
	
	private function area_cache_update() {
		$sql = "SELECT * FROM {$this->db->dbprefix('areas')}
				ORDER BY parent_id ASC, display_order ASC";
		$query = $this->db->query($sql);
		
		$slug_array = array();
		self::$area_list = array();
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $val) {
				self::$area_list['tree'][$val['id']] = $val;
				$slug_array[] = $val['area_slug'];
				
				self::$area_list['nav'][$val['area_slug']] = $val;
				self::$area_list['nav'][$val['area_slug']]['parent'] = $this->track_parent($query->result_array(), $val['id']);
				self::$area_list['nav'][$val['area_slug']]['neighbor'] = $this->track_neighbor($query->result_array(), $val['parent_id']);
				
			}
			
			self::$area_list['tree'] = array_2_tree(self::$area_list['tree']);
		}
		
		file_put_contents($this->route_conf_file, implode(',', $slug_array));
		
		$this->cache_update(self::$area_list);
		return self::$area_list;
	}
	
	private function track_parent($array, $id, $result = array()) {
		foreach($array as $val) {
			if($val['id'] != $id) {
				continue;
			}
			
			$result[] = $val;
			
			if($val['parent_id'] == '0') {
				return $result;
			} else {
				return $this->track_parent($array, $val['parent_id'], $result);
			}
		}
	}
	private function track_neighbor($array, $parent_id) {
		$result = array();
		foreach($array as $val) {
			if($val['parent_id'] == $parent_id) {
				$result[] = $val;
			}
		}
		
		return $result;
	}
}
?>