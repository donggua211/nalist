<?php

class EntryController extends AdminAppController {

/**
 * @var array
 */
	public $uses = array();

/**
 * index view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function index() {
		
		$this->layout = 'Admin.default';
		
		echo 'admin.index';
		
	}
}
