<?php
App::uses('AppController', 'Controller');
/**
 * Infos Controller
 *
 * @property Info $Info
 * @property PaginatorComponent $Paginator
 */
class InfosController extends AppController {

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
		$this->loadModel('Category');
		$this->loadModel('Filter');
		
		$city = $this->request->params['city'];
		$cat_slug = $this->request->params['cat_slug'];
		
		$categoryID = $this->Category->getid_by_slug($cat_slug);
		
		$options = array('conditions' => array('Filter.category_id' => $categoryID));
		$filters = $this->Filter->find('all', $options);
		
		$options = array('conditions' => array('Info.category_id' => $categoryID));
		$infos = $this->Info->find('all', $options);
		
		$this->set(compact('infos', 'filters'));
	}
	
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Info->exists($id)) {
			throw new NotFoundException(__('Invalid info'));
		}
		$options = array('conditions' => array('Info.' . $this->Info->primaryKey => $id));
		$this->set('info', $this->Info->find('first', $options));
	}
}
