<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function get_site_config($config_name) {
	if(empty($config_name))
		return $config_name;
	
	$CI =& get_instance();
	
	return $CI->site_config_model->get_config($config_name);
}


//Template helper
function get_header($data = array()) {
	$CI =& get_instance();
	$data = array_merge($CI->template_data, $data);
	
	$CI->load->view('parts/header.php', $data);
}

function get_footer($data = array()) {
	$CI =& get_instance();
	$data = array_merge($CI->template_data, $data);
	
	$CI->load->view('parts/footer.php', $data);
}

function get_template($template, $data = array()) {
	$CI =& get_instance();
	$data = array_merge($CI->template_data, $data);
	
	$CI->load->view($template, $data);
}

function get_sidebar($id = '', $data = array()) {
	$CI =& get_instance();
	$data = array_merge($CI->template_data, $data);
	
	$sidebar = empty($id) ? 'sidebar.php' : 'sidebar_'.$id.'.php';
	$CI->load->view('parts/'.$sidebar, $data);
}