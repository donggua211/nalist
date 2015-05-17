<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Static Pages. Not city prefix.

class Page extends Front_Controller {
	
	public function city_list() {
		$this->load->model('area_model');
		$data['area_list'] = $this->area_model->tree();
		$this->load->front_template('home/city_list', $data);
	}
	
	public function lang_switch($language = "") {
		$this->load->library('user_agent');
		
		$language = ($language != "") ? $language : $this->config->item('language');
		$this->session->set_userdata('language', $language);
		
		if ($this->agent->is_referral()) {
			$redirect_url = $this->agent->referrer();
		} else {
			$redirect_url = site_url();
		}
		
		redirect($redirect_url);
	}
}