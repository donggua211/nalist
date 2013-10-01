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
		$this->FeatureCat->recursive = 0;
		$this->set('docCats', $this->DocCat->find('threaded'));
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

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->DocCat->create();
			if ($this->DocCat->save($this->request->data)) {
				$this->Session->setFlash(__('The doc cat has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The doc cat could not be saved. Please, try again.'));
			}
		}
		$docs = $this->DocCat->Doc->find('list');
		$docsList = $this->DocCat->generateTreeList(null, null, null, '---');
		$this->set(compact('docs'));
		$this->set(compact('docsList'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->DocCat->exists($id)) {
			throw new NotFoundException(__('Invalid doc cat'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->DocCat->save($this->request->data)) {
				$this->Session->setFlash(__('The doc cat has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The doc cat could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('DocCat.' . $this->DocCat->primaryKey => $id));
			$this->request->data = $this->DocCat->find('first', $options);
		}
		$docs = $this->DocCat->Doc->find('list');
		$this->set(compact('docs'));
		$docsList = $this->DocCat->generateTreeList(null, null, null, '---');
		$this->set(compact('docsList'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->DocCat->id = $id;
		if (!$this->DocCat->exists()) {
			throw new NotFoundException(__('Invalid doc cat'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->DocCat->delete()) {
			$this->Session->setFlash(__('The doc cat has been deleted.'));
		} else {
			$this->Session->setFlash(__('The doc cat could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
