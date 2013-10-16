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
	public function view($id = null) {
		if (!$this->Filter->exists($id)) {
			throw new NotFoundException(__('Invalid filter'));
		}
		$options = array('conditions' => array('Filter.' . $this->Filter->primaryKey => $id));
		$this->set('filter', $this->Filter->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Filter->create();
			if ($this->Filter->save($this->request->data)) {
				$this->Session->setFlash(__('The filter has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The filter could not be saved. Please, try again.'));
			}
		}
		$categories = $this->Filter->Category->find('list');
		$infos = $this->Filter->Info->find('list');
		$this->set(compact('categories', 'infos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Filter->exists($id)) {
			throw new NotFoundException(__('Invalid filter'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Filter->save($this->request->data)) {
				$this->Session->setFlash(__('The filter has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The filter could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Filter.' . $this->Filter->primaryKey => $id));
			$this->request->data = $this->Filter->find('first', $options);
		}
		$categories = $this->Filter->Category->find('list');
		$infos = $this->Filter->Info->find('list');
		$this->set(compact('categories', 'infos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Filter->id = $id;
		if (!$this->Filter->exists()) {
			throw new NotFoundException(__('Invalid filter'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Filter->delete()) {
			$this->Session->setFlash(__('The filter has been deleted.'));
		} else {
			$this->Session->setFlash(__('The filter could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
