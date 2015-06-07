<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends Front_Controller {
	public function info_list($category_slug) {
		//Language File
		$this->lang->load('info', $this->language);
		
		$this->load->model('Category_model');
		$this->load->model('filter_model');
		
		$category_info = $this->Category_model->get_nav_by_slug($category_slug);
		
		$data['category_info'] = $category_info;
		$data['filter_info'] = $this->filter_model->get_filter_by_categories($category_info['context_parent_id']);
		$this->load->front_template('info/info_list', $data);
	}
}