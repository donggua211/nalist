<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Front_Controller {
	
	public function index() {
		
		
		$this->load->model('Category_model');
		$data['category_list'] = $this->Category_model->tree();
		$this->load->front_template('home/home', $data);
	}
	
	public function city_list() {
		$this->load->model('area_model');
		$data['area_list'] = $this->area_model->tree();
		$this->load->front_template('home/city_list', $data);
	}
}