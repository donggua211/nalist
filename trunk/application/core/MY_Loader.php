<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Loader extends CI_Loader {

	function __construct() {
		parent::__construct();
	}
	
	function set_theme($theme) {
		$this->_ci_view_paths = array($theme . '/' => TRUE);
	}
	
    public function admin_template($template_name, $vars = array(), $return = FALSE) {
		$CI = & get_instance();
		
		$vars = array_merge($CI->template_data, $vars);

		$content  = $this->view('parts/header', $vars, $return);
        $content .= $this->view($template_name, $vars, $return);
        $content .= $this->view('parts/footer', $vars, $return);

        if ($return) {
            return $content;
        }
    }
	
    public function front_template($template_name, $vars = array(), $return = FALSE) {
        $CI = & get_instance();
		
		$vars = array_merge($CI->template_data, $vars);
		
		$content  = $this->view('parts/header', $vars, $return);
        $content .= $this->view($template_name, $vars, $return);
        $content .= $this->view('parts/footer', $vars, $return);

        if ($return) {
            return $content;
        }
    }
}