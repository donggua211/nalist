<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Front_Controller {
	
	public function index() {
		
		
		$this->load->model('Category_model');
		$data['category_list'] = $this->Category_model->tree();
		$this->load->front_template('home/home', $data);
	}
}