<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {

	function __construct() {
		parent::__construct();
		
		//Load Driver
		$this->load->driver('cache', array('adapter' => 'file'));
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
	
	public function cache_update($cache_array) {
		if(empty($this->cache_key)) {
			show_error('You must $this->cache_key to use cache in MY_Model.');
		}
		
		$this->cache->save($this->cache_key, $cache_array, 24 * 60 *60 * 365);
		return $cache_array;
	}
}