<?php
App::uses('AppController', 'Controller');
/**
 * InfoMeta Controller
 *
 * @property InfoMetum $InfoMetum
 * @property PaginatorComponent $Paginator
 */
class InfoMetaController extends AppController {

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
		$this->InfoMetum->recursive = 0;
		$this->set('infoMeta', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->InfoMetum->exists($id)) {
			throw new NotFoundException(__('Invalid info metum'));
		}
		$options = array('conditions' => array('InfoMetum.' . $this->InfoMetum->primaryKey => $id));
		$this->set('infoMetum', $this->InfoMetum->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->InfoMetum->create();
			if ($this->InfoMetum->save($this->request->data)) {
				$this->Session->setFlash(__('The info metum has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The info metum could not be saved. Please, try again.'));
			}
		}
		$infos = $this->InfoMetum->Info->find('list');
		$this->set(compact('infos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->InfoMetum->exists($id)) {
			throw new NotFoundException(__('Invalid info metum'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->InfoMetum->save($this->request->data)) {
				$this->Session->setFlash(__('The info metum has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The info metum could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('InfoMetum.' . $this->InfoMetum->primaryKey => $id));
			$this->request->data = $this->InfoMetum->find('first', $options);
		}
		$infos = $this->InfoMetum->Info->find('list');
		$this->set(compact('infos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->InfoMetum->id = $id;
		if (!$this->InfoMetum->exists()) {
			throw new NotFoundException(__('Invalid info metum'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->InfoMetum->delete()) {
			$this->Session->setFlash(__('The info metum has been deleted.'));
		} else {
			$this->Session->setFlash(__('The info metum could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
