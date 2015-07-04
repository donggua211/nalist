<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Admin_Controller {

	function __construct() {
		parent::__construct();
	}
	
	function index() {
		$this->load->admin_template('entry/home');
	}
}