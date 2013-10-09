<?php
/**
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AppController', 'Controller');

/**
 * Entry controller
 *
 * @package       app.Controller
 * @link 
 */
class EntryController extends AppController {

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
		$this->Doc->recursive = 0;
		$this->set('docs', $this->Paginator->paginate('Doc'));
		
        $this->loadModel('Feature');
		$this->Feature->recursive = 0;
		$this->set('features', $this->Paginator->paginate('Feature'));
		
		
	}
	
	public function search() {
		$q = $this->request->query('q');
		$this->set('q', $q);
		
		if(!empty($q)) {
			$this->loadModel('Doc');
			$this->set('docs', $this->Paginator->paginate('Doc', array("OR" => array('Doc.name LIKE' => '%'.$q.'%', 'Doc.description LIKE' => '%'.$q.'%'))));
			
			$this->loadModel('Feature');
			$this->set('features', $this->Paginator->paginate('Feature', array("OR" => array('Feature.name LIKE' => '%'.$q.'%', 'Feature.description LIKE' => '%'.$q.'%'))));
		}
	}
}
