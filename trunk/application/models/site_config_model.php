<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site_config_model extends Cache_Model {
	var $cache_key = 'site_config';
	
	public $site_config = array();
	
	function __construct() {
        parent::__construct();
    }
	
	public function cache_update() {
		$sql = "SELECT * FROM {$this->db->dbprefix('site_configs')}";
		$query = $this->db->query($sql);
		
		$this->data_list = array();
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $val) {
				$this->data_list[$val['config_name']] = $val['config_value'];
			}
		}
		
		$this->cache_save($this->data_list);
		return TRUE;
	}
	
	function get_config($config_name) {
		if(array_key_exists($config_name, $this->data_list)) {
			return $this->data_list[$config_name];
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
		
		$this->cache_update();
		return true;
	}
}
?>