<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_api extends Admin_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	public function filter_remove() {
		$this->load->model('filter_option_model');
		
		$option_id = $this->input->get_post('option_id');
		
		if(empty($option_id)) {
			echo 'NG';
			return false;
		}
		
		if($this->filter_option_model->remove($option_id)) {
			echo 'OK';
		} else {
			echo 'NG';
		}
		return true;
	}
}