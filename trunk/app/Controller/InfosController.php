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
	public function view($id = null) {
		if (!$this->Info->exists($id)) {
			throw new NotFoundException(__('Invalid info'));
		}
		$options = array('conditions' => array('Info.' . $this->Info->primaryKey => $id));
		$this->set('info', $this->Info->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Info->create();
			if ($this->Info->save($this->request->data)) {
				$this->Session->setFlash(__('The info has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The info could not be saved. Please, try again.'));
			}
		}
		$areas = $this->Info->Area->find('list');
		$categories = $this->Info->Category->find('list');
		$users = $this->Info->User->find('list');
		$filters = $this->Info->Filter->find('list');
		$this->set(compact('areas', 'categories', 'users', 'filters'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Info->exists($id)) {
			throw new NotFoundException(__('Invalid info'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Info->save($this->request->data)) {
				$this->Session->setFlash(__('The info has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The info could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Info.' . $this->Info->primaryKey => $id));
			$this->request->data = $this->Info->find('first', $options);
		}
		$areas = $this->Info->Area->find('list');
		$categories = $this->Info->Category->find('list');
		$users = $this->Info->User->find('list');
		$filters = $this->Info->Filter->find('list');
		$this->set(compact('areas', 'categories', 'users', 'filters'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Info->id = $id;
		if (!$this->Info->exists()) {
			throw new NotFoundException(__('Invalid info'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Info->delete()) {
			$this->Session->setFlash(__('The info has been deleted.'));
		} else {
			$this->Session->setFlash(__('The info could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
