<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site_config_model extends MY_Model {

	public $config = array();
	var $cache_key = 'site_config';
	
	function __construct() {
        parent::__construct();
		
		$this->load->driver('cache', array('adapter' => 'file'));
		
		$this->_load_config();
    }
	
	private function site_config_cache_update() {
		$sql = "SELECT * FROM {$this->db->dbprefix('site_configs')}";
		$query = $this->db->query($sql);
		
		$this->config = array();
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $val) {
				$this->config[$val['config_name']] = $val['config_value'];
			}
		}
		
		$this->cache_update($this->config);
		return TRUE;
	}
	
	private function _load_config() {
		$this->config = $this->cache_get();
		
		if(empty($this->config)) {
			$this->site_config_cache_update();
		}
		
		return TRUE;
	}
	
	function get_all_config() {
		return $this->config;
	}
	
	function get_config($config_name) {
		if(array_key_exists($config_name, $this->config)) {
			return $this->config[$config_name];
		} else {
			return FALSE;
		}
	}
	
	public function update_config($update_field = array()) {
		if(empty($update_field)) {
			return true;
		}
		
		foreach($update_field as $key => $val){
			if($this->get_config($key) === FALSE) {
				$fields = array(
					'config_name' => $key,
					'config_value' => $val,
				);
				$this->db->insert('site_configs', $fields);
			} else {
				$this->db->where('config_name', $key);
				$this->db->update('site_configs', array('config_value' => $val));
			}
		}
		
		$this->site_config_cache_update();
		return true;
	}
}
?>