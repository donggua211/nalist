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
		$this->loadModel('Doc');
		$this->set('docs', $this->Doc->find('all'));
		
        $this->loadModel('Feature');
		$this->set('features', $this->Feature->find('all'));
	}
}
