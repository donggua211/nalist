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
function pack_fileter($category_slug, $filter, $page = '') {
	$filter_string = '';
	
	if(!empty($filter)) {
		ksort($filter);
		$filter_str = implode('', $filter);
	}
	
	$base_url = $category_slug;

	if(!empty($filter_str)) {
		$base_url .= '/'.$filter_str;
	}
	
	if(!empty($page) && $page > 0) {
		if(strpos($base_url, 'page') !== false) {
			$base_url = preg_replace('/page.*+/', 'page'.$page , $base_url);
		} else {
			$base_url .= '/page'.$page;
		}
	}
	
	return site_url($base_url);
}