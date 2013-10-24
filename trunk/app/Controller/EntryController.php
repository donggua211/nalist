<?php
App::uses('AppController', 'Controller');
/**
 * Entry Controller
 */



class EntryController extends AppController {

/**
 * @var array
 */


/**
 * index view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function index() {
		echo 'Hello';
	}
}
