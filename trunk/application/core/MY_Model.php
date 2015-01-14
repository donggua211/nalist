<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {
	
}

class Cache_Model extends MY_Model {
	public $data_list = array();
	
	function __construct() {
		parent::__construct();
		
		//Load Driver
		$this->load->driver('cache', array('adapter' => 'file'));
		
		//Get frin Cache first.
		$this->data_list = $this->cache_get();
		
		if(empty($this->data_list)) {
			$this->data_list = $this->cache_update();
		}
	}
	
	public function all() {
		return $this->data_list;
	}
	
	public function cache_get() {
		if(empty($this->cache_key)) {
			show_error('You must $this->cache_key to use cache in MY_Model.');
		}
		
		$cache_array = $this->cache->get($this->cache_key);
		if(empty($cache_array)) {
			$cache_array = array();
		}
		
		return $cache_array;
	}
	
	public function cache_save($cache_array) {
		if(empty($this->cache_key)) {
			show_error('You must $this->cache_key to use cache in MY_Model.');
		}
		
		$this->cache->save($this->cache_key, $cache_array, 24 * 60 *60 * 365);
		return $cache_array;
	}
}

class TREE_Model extends Cache_Model {
	public $route_conf_file = '';
	public $slug_list = array();
	
	function __construct() {
		parent::__construct();
		
		if(empty($this->table) || empty($this->slug_key)) {
			show_error('You must $this->table and $this->slug_key to use Tree_Model.');
		}
		
		$this->route_conf_file = FCPATH.'.route_'.$this->cache_key;
	}
	
	public function tree() {
		return $this->data_list['tree'];
	}
	
	public function get_one_by_slug($slug) {
		return ($this->data_list['nav'][$slug]);
	}
	
	public function check_slug($slug) {
		if(empty($slug)) {
			return false;
		}
		
		if(empty($this->slug_list)) {
			$this->slug_list = $this->_deep_get_city_slug($this->data_list['tree']);
		}
		
		return in_array($slug, $this->slug_list);
	}
	
	public function remove($id) {
		$this->_deep_remove($this->table, $id);
		$this->cache_update();
		return true;
	}
	
	private function _deep_get_city_slug($list, $slugs = array()) {
		foreach($list as $val) {
			$slugs[] = $val[$this->slug_key];
			
			if(isset($val['children']) && is_array($val['children'])) {
				$slugs = $this->_deep_get_city_slug($val['children'], $slugs);
			}
		}
		
		return $slugs;
	}
	
	private function _deep_remove($id) {
		//Delete
		$this->db->delete($this->table, array('id' => $id)); 
		
		//Check children
		$sql = "SELECT * FROM {$this->db->dbprefix($this->table)}
				WHERE parent_id = '$id'";
		$query = $this->db->query($sql);
		
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $val) {
				$this->_deep_remove($val['id']);
			}
		}
		
		return true;
	}
	
	public function cache_update() {
		$sql = "SELECT * FROM {$this->db->dbprefix($this->table)}
				ORDER BY parent_id ASC, display_order ASC";
		$query = $this->db->query($sql);
		
		$slug_array = array();
		$this->data_list = array();
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $val) {
				$this->data_list['tree'][$val['id']] = $val;
				$slug_array[] = $val[$this->slug_key];
				
				$this->data_list['nav'][$val[$this->slug_key]] = $val;
				$this->data_list['nav'][$val[$this->slug_key]]['parent'] = array_reverse($this->_track_parent($query->result_array(), $val['id']));
				$this->data_list['nav'][$val[$this->slug_key]]['neighbor'] = $this->_track_neighbor($query->result_array(), $val['parent_id']);
				
			}
			
			$this->data_list['tree'] = array_2_tree($this->data_list['tree']);
		}
		
		file_put_contents($this->route_conf_file, implode(',', $slug_array));
		
		$this->cache_save($this->data_list);
		return $this->data_list;
	}
	
	private function _track_parent($array, $id, $result = array()) {
		foreach($array as $val) {
			if($val['id'] != $id) {
				continue;
			}
			
			$result[] = $val;
			
			if($val['parent_id'] == '0') {
				return $result;
			} else {
				return $this->_track_parent($array, $val['parent_id'], $result);
			}
		}
	}
	private function _track_neighbor($array, $parent_id) {
		$result = array();
		foreach($array as $val) {
			if($val['parent_id'] == $parent_id) {
				$result[] = $val;
			}
		}
		
		return $result;
	}
}