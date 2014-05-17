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
		$this->Info->recursive = 0;
		$this->set('infos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function category($slug = null) {
		$this->loadModel('Category');
		$this->loadModel('Filter');
		
		$city = $this->request->params['city'];
		$cat_slug = $this->request->params['cat_slug'];
		
		$categoryID = $this->Category->getid_by_slug($slug);
		
		
		$options = array('conditions' => array('Info.category_id' => $categoryID));
		$this->set('info', $this->Info->find('all', $options));
		
		$options = array('conditions' => array('Info.category_id' => $categoryID));
		$this->set('info', $this->Info->find('all', $options));
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
