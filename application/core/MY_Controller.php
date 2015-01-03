<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	public $template_data = array();
	
	function __construct() {
		parent::__construct();
		
		$this->load->model('site_config_model');
	}
}

class Front_Controller extends MY_Controller {
	public $theme = '';
	
	function __construct() {
		parent::__construct();
		
		//get theme from tbl: site_config
		$this->theme = $this->Config_model->get_config('theme');
		$this->theme = $this->theme && is_dir(THEMEPATH . $this->theme) ? $this->theme : 'default';
		$this->load->set_theme(THEMEPATH . $this->theme);
		define('__THEME_URI__', base_url() . THEMEPATH . $this->theme . '/');
		
		//Load user defined function is function.php is exist;
		if(file_exists( THEMEPATH . $this->theme . '/functions.php')) {
			include_once(THEMEPATH . $this->theme . '/functions.php');
		}
		
		$this->template_data['site_name'] = $this->site_config_model->get_config('site_name');
	}
}

class Admin_Controller extends MY_Controller {

	function __construct() {
		parent::__construct();
		
		//Check admin user login.
		$current_controller = $this->router->fetch_class();
		if (!in_array($current_controller, array('admin_user')) && !$this->_admin_check_login()) {
			$uri = urlencode(uri_string());
			redirect('admin/admin_user/login/?uri=' . $uri);
		}
		
		//Load helper
		$this->load->helper('admin/template');
		
		//Set admin theme
		$this->theme = 'admin_theme';
		$this->load->set_theme(THEMEPATH . $this->theme);
		define('__THEME_URI__', base_url() . THEMEPATH . $this->theme . '/');
		
		//Set template data.
		$this->template_data['site_name'] = $this->site_config_model->get_config('site_name') . '管理页面';
	}
	
	/*
	  Login Functions.
	*/
	function _admin_check_login() {
		return $this->session->userdata('admin_id');
	}
}
