<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Info extends Front_Controller {
	public function info_list($category_slug) {
		
		$this->load->model('Category_model');
		$data['category_info'] = $this->Category_model->get_one_by_slug($category_slug);
		$this->load->front_template('info/info_list', $data);
	}
}