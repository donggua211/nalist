<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site_config extends Admin_Controller {

	function __construct() {
		parent::__construct();
	}
	
	public function index() {
		if(isset($_POST) && !empty($_POST)) {
			foreach($_POST as $key => $val) {
				if(in_array($key, array('submit'))) {
					continue;
				}
				
				$data[$key] = $this->input->post($key);
			}
			
			$site_config = $this->site_config_model->all();
			$update_field = array();
			foreach($data as $key => $val) {
				if((!isset($site_config[$key]) || $val != $site_config[$key])) {
					$update_field[$key] = $val;
				}
			}
			
			if($this->site_config_model->update_config($update_field)) {
				$data['message']['ok'] = '更新成功! ';
			} else {
				$data['message']['error'] = '分类添加失败, 请重试.';
			}
			
			show_result_page($data['message'], 'admin/site_config');
			return true;
		} else {
			$data = $this->site_config_model->all();
			$data['themes'] = $this->_get_all_theme();
			$this->load->admin_template('site_config/index', $data);
		}
	}
	
	private function _get_all_theme() {
		$this->load->helper('directory');
		
		$result = array();
		$map = directory_map(THEMEPATH, 1);
		
		foreach($map as $key => $file) {
			if($file == 'admin_theme') {
				continue;
			}
			$result[] = $file;
		}
		return $result;
	}
}