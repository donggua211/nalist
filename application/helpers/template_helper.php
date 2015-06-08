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


//URL
function pack_fileter_url($page, $filter, $base_url = '') {
	if(empty($filter))
		return '';
	
	$temp = array();
	foreach($filter as $key => $val)
	{
		if(empty($val) && ($val === FALSE))
			continue;
		
		if($key == 'page') {
			continue;
		}
		
		$temp[] = $key.'='.$val;
	}
	
	if(empty($base_url)) {
		$base_url = uri_string();
	}
	
	if(strpos($base_url, 'page') !== false) {
		$base_url = preg_replace('/page.*+/', 'page'.$page , $base_url);
	} else {
		$base_url .= '/page'.$page;
	}
	
	
	$filter_string = !empty($temp) ? '?'.implode('&', $temp) : '';
	return site_url($base_url).$filter_string;
}