<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	public $template_data = array();
	
	public $is_front = FALSE;
	public $is_admin = FALSE;
	
	function __construct() {
		parent::__construct();
		
		$this->load->model('site_config_model');
	}
}

class Front_Controller extends MY_Controller {
	public $city_slug = '';
	public $theme = '';
	
	function __construct() {
		parent::__construct();
		
		$this->is_front = TRUE;
		
		//Loader:
		$this->load->helper('template');
		$this->load->model('area_model');
		$this->load->library('geoip/geoip');
		
		//get theme from tbl: site_config
		$this->theme = $this->site_config_model->get_config('theme');
		$this->theme = $this->theme && is_dir(THEMEPATH . $this->theme) ? $this->theme : 'default';
		$this->load->set_theme(THEMEPATH . $this->theme);
		define('__THEME_URI__', base_url() . THEMEPATH . $this->theme . '/');
		
		//Load user defined function is function.php is exist;
		if(file_exists( THEMEPATH . $this->theme . '/function.php')) {
			include_once(THEMEPATH . $this->theme . '/function.php');
		}
		
		//Check City
		if(!($this->router->class == 'home' && $this->router->method == 'city_list')) {
			$this->city_slug = $this->uri->rsegment($this->uri->total_rsegments());
			
			if(!$this->area_model->check_city($this->city_slug)) {
				$this->city_slug = '';
			}
			
			if(empty($this->city_slug)) {
				$ip = $this->input->ip_address();
				
				//@TEST for test purpose.
				$ip = '173.55.124.51';
				
				if(!empty($ip)) {
					$geo_info = $this->geoip->find($ip);
					
					//Will show city list, if can not get geo_info info
					if($geo_info != false && strtolower($geo_info['country_code']) == 'us') {
						$this->city_slug = generate_slug($geo_info['city']);
						if(!$this->area_model->check_city($this->city_slug)) {
							$this->city_slug = '';
						}else {
							redirect(uri_string());
						}
					}
				}
			}
			
			if(empty($this->city_slug)) {
				redirect('home/city_list');
			}
			
			$this->template_data['city_slug'] = $this->city_slug;
			$this->template_data['city_info'] = $this->area_model->get_one_by_slug($this->city_slug);
		}
		
		//Set template_data
		$this->template_data['site_name'] = $this->site_config_model->get_config('site_name');
	}
}

class Admin_Controller extends MY_Controller {

	function __construct() {
		parent::__construct();
		
		$this->is_admin = TRUE;
		
		//Check admin user login.
		$current_controller = $this->router->fetch_class();
		if (!in_array($current_controller, array('admin_user')) && !$this->_admin_check_login()) {
			$uri = urlencode(uri_string());
			redirect('admin/admin_user/login/?uri=' . $uri);
		}
		
		//Set admin theme
		$this->theme = 'admin_theme';
		$this->load->set_theme(THEMEPATH . $this->theme);
		define('__THEME_URI__', base_url() . THEMEPATH . $this->theme . '/');
		
		//Load helper
		$this->load->helper('admin/template');
		
		//Set template data.
		$this->template_data['site_name'] = $this->site_config_model->get_config('site_name') . '管理页面';
	}
	
	/*
	  Login Function.
	*/
	function _admin_check_login() {
		return $this->session->userdata('admin_id');
	}
}
