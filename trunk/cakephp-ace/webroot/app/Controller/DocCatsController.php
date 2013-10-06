<?php
App::uses('AppController', 'Controller');
/**
 * DocCats Controller
 *
 * @property DocCat $DocCat
 * @property PaginatorComponent $Paginator
 */
class DocCatsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->helpers[] = 'Cat';
		$this->DocCat->recursive = 0;
		$this->set('docCats', $this->DocCat->generateTreePlusList());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->DocCat->exists($id)) {
			throw new NotFoundException(__('Invalid doc cat'));
		}
		$options = array('conditions' => array('DocCat.' . $this->DocCat->primaryKey => $id));
		$this->set('docCat', $this->DocCat->find('first', $options));
	}
}
