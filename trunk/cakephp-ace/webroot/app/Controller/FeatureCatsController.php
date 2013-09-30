<?php
App::uses('AppController', 'Controller');
/**
 * FeatureCats Controller
 *
 * @property FeatureCat $FeatureCat
 * @property PaginatorComponent $Paginator
 */
class FeatureCatsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->FeatureCat->recursive = 0;
		$this->set('featureCats', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FeatureCat->exists($id)) {
			throw new NotFoundException(__('Invalid feature cat'));
		}
		$options = array('conditions' => array('FeatureCat.' . $this->FeatureCat->primaryKey => $id));
		$this->set('featureCat', $this->FeatureCat->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FeatureCat->create();
			if ($this->FeatureCat->save($this->request->data)) {
				$this->Session->setFlash(__('The feature cat has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The feature cat could not be saved. Please, try again.'));
			}
		}
		$features = $this->FeatureCat->Feature->find('list');
		$this->set(compact('features'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FeatureCat->exists($id)) {
			throw new NotFoundException(__('Invalid feature cat'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FeatureCat->save($this->request->data)) {
				$this->Session->setFlash(__('The feature cat has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The feature cat could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FeatureCat.' . $this->FeatureCat->primaryKey => $id));
			$this->request->data = $this->FeatureCat->find('first', $options);
		}
		$features = $this->FeatureCat->Feature->find('list');
		$this->set(compact('features'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FeatureCat->id = $id;
		if (!$this->FeatureCat->exists()) {
			throw new NotFoundException(__('Invalid feature cat'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->FeatureCat->delete()) {
			$this->Session->setFlash(__('The feature cat has been deleted.'));
		} else {
			$this->Session->setFlash(__('The feature cat could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
