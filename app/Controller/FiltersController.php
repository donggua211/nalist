<?php
App::uses('AppController', 'Controller');
/**
 * Filters Controller
 *
 * @property Filter $Filter
 * @property PaginatorComponent $Paginator
 */
class FiltersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Filter->recursive = 0;
		$this->set('filters', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function findByCat($cat_slug = null) {
		$this->loadModel('Category');
		$categoryID = $this->Category->getid_by_slug($cat_slug);
		
		$options = array('conditions' => array('Filter.category_id' => $categoryID, 'Filter.type' => 'radio'), 'fields'=>array('Filter.key', 'Filter.rule'));
		return $this->Filter->find('list', $options);
	}
}
