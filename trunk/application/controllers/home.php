<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Front_Controller {
	
	public function index() {
		$this->load->model('area_model');
		
		//Check IP
		$this->load->library('geoip/geoip');
		$geo_info = $this->geoip->find('172.249.210.114');
		
		//Will show city list, if can not get geo_info info
		if($geo_info != false && strtolower($geo_info['country_code']) == 'us') {
			if($this->area_model->check_city($geo_info)) {
				redirect(generate_slug($geo_info['city']));
				
			}
		}
		
		$this->load->model('area_model');
		$data['area_list'] = $this->area_model->tree();
		$this->load->front_template('home', $data);
	}
}