<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Front_Controller {
	
	public function index() {
		$this->load->model('area_model');
		$data['area_list'] = $this->area_model->tree();
		$this->load->front_template('home', $data);
	}
}