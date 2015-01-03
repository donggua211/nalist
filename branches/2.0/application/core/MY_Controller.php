<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	public $template_data = array();
	
	function __construct() {
		parent::__construct();
		
		$this->load->model('site_config_model');
	}
}

class Front_Controller extends MY_Controller {
	function __construct() {
		parent::__construct();
		
		$this->template_data['site_name'] = $this->site_config_model->get_config('site_name');
	}
}

class Admin_Controller extends MY_Controller {

	function __construct() {
		parent::__construct();
		
		$current_controller = $this->router->fetch_class();
		
		if (!in_array($current_controller, array('admin_user')) && !$this->_admin_check_login()) {
			$uri = urlencode(uri_string());
			redirect('admin/admin_user/login/?uri='.$uri);
		}
		
		//Load helper
		$this->load->helper('admin/template');
		
		$this->template_data['site_name'] = $this->site_config_model->get_config('site_name').'管理页面';
	}
	
	/*
	  Login Functions.
	*/
	function _admin_check_login() {
		return $this->session->userdata('admin_id');
	}
}
