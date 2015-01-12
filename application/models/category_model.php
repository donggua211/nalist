<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends MY_Model {

	var $cache_key = 'category_list';
	
	public $route_conf_file = '';
	
	public static $category_list = array();
	
	public $city_slug = array();
	
	public function __construct() {
		parent::__construct();
		
		$this->route_conf_file = FCPATH.'.category_route';
		
		//Get frin Cache first.
		self::$category_list = $this->cache_get();
		
		if(empty(self::$category_list)) {
			self::$category_list = $this->category_cache_update();
		}
	}
	
	/* Front end functions */
	public function check_city($city_slug) {
		if(empty($city_slug)) {
			return false;
		}
		
		if(empty($this->city_slug)) {
			$this->city_slug = $this->_deep_get_city_slug(self::$category_list['tree']);
		}
		
		return in_array($city_slug, $this->city_slug);
	}
	
	private function _deep_get_city_slug($category_list, $city_slug = array()) {
		foreach($category_list as $val) {
			$city_slug[] = $val['category_slug'];
			
			if(isset($val['children']) && is_array($val['children'])) {
				$city_slug = $this->_deep_get_city_slug($val['children'], $city_slug);
			}
		}
		
		return $city_slug;
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
	
	public function tree() {
		return self::$category_list['tree'];
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
	
	public function get_one_by_slug($city_slug) {
		return (self::$category_list['nav'][$city_slug]);
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
	
	
	private function category_cache_update() {
		$sql = "SELECT * FROM {$this->db->dbprefix('categories')}
				ORDER BY parent_id ASC, display_order ASC";
		$query = $this->db->query($sql);
		
		$slug_array = array();
		self::$category_list = array();
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $val) {
				self::$category_list['tree'][$val['id']] = $val;
				$slug_array[] = $val['category_slug'];
				
				self::$category_list['nav'][$val['category_slug']] = $val;
				self::$category_list['nav'][$val['category_slug']]['parent'] = array_reverse($this->track_parent($query->result_array(), $val['id']));
				self::$category_list['nav'][$val['category_slug']]['neighbor'] = $this->track_neighbor($query->result_array(), $val['parent_id']);
			}
			
			self::$category_list['tree'] = array_2_tree(self::$category_list['tree']);
		}
		
		file_put_contents($this->route_conf_file, implode(',', $slug_array));
		
		$this->cache_update(self::$category_list);
		return self::$category_list;
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