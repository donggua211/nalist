<?php
App::uses('AppController', 'Controller');
/**
 * CategoriesFilters Controller
 *
 * @property CategoriesFilter $CategoriesFilter
 * @property PaginatorComponent $Paginator
 */
class CategoriesFiltersController extends AppController {

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
		$this->CategoriesFilter->recursive = 0;
		$this->set('categoriesFilters', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CategoriesFilter->exists($id)) {
			throw new NotFoundException(__('Invalid categories filter'));
		}
		$options = array('conditions' => array('CategoriesFilter.' . $this->CategoriesFilter->primaryKey => $id));
		$this->set('categoriesFilter', $this->CategoriesFilter->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CategoriesFilter->create();
			if ($this->CategoriesFilter->save($this->request->data)) {
				$this->Session->setFlash(__('The categories filter has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The categories filter could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CategoriesFilter->exists($id)) {
			throw new NotFoundException(__('Invalid categories filter'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CategoriesFilter->save($this->request->data)) {
				$this->Session->setFlash(__('The categories filter has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The categories filter could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CategoriesFilter.' . $this->CategoriesFilter->primaryKey => $id));
			$this->request->data = $this->CategoriesFilter->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->CategoriesFilter->id = $id;
		if (!$this->CategoriesFilter->exists()) {
			throw new NotFoundException(__('Invalid categories filter'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CategoriesFilter->delete()) {
			$this->Session->setFlash(__('The categories filter has been deleted.'));
		} else {
			$this->Session->setFlash(__('The categories filter could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
