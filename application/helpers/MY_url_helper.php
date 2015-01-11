<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function site_url($uri = '', $prefix_city = TRUE) {
	$CI =& get_instance();
	
	//Skip for Admin.
	if($CI->is_front && $prefix_city) {
		$uri = $CI->city_slug.'/'.$uri;
	}
	
	return $CI->config->site_url($uri);
}

function abs_site_url($uri = '') {
	$CI =& get_instance();
	
	//Skip for Admin.
	if($CI->is_front) {
		$uri = $CI->city_slug.'/'.$uri;
	}
	
	return $CI->config->site_url($uri);
}