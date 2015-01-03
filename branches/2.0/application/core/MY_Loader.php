<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Loader extends CI_Loader {

	function __construct() {
		parent::__construct();
	}
	
    public function admin_template($template_name, $vars = array(), $return = FALSE) {
		$CI = & get_instance();
		
		$vars = array_merge($CI->template_data, $vars);

		$content  = $this->view('admin/parts/header', $vars, $return);
        $content .= $this->view('admin/'.$template_name, $vars, $return);
        $content .= $this->view('admin/parts/footer', $vars, $return);

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