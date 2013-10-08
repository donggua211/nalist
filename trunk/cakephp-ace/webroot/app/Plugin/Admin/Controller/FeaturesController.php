<?php

class FeaturesController extends AdminAppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Feature->recursive = 0;
		$this->set('features', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Feature->exists($id)) {
			throw new NotFoundException(__('Invalid feature'));
		}
		$options = array('conditions' => array('Feature.' . $this->Feature->primaryKey => $id));
		$this->set('feature', $this->Feature->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			 $this->request->data['Feature']['user_id'] = $this->Auth->user('id');
			$this->Feature->create();
			if ($this->Feature->save($this->request->data)) {
				$this->Session->setFlash(__('The feature has been saved.'), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The feature could not be saved. Please, try again.'));
			}
		}
		$docs = $this->Feature->Doc->find('list');
		$featureCats = $this->Feature->FeatureCat->find('list');
		$this->set(compact('docs', 'featureCats'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Feature->exists($id)) {
			throw new NotFoundException(__('Invalid feature'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Feature->save($this->request->data)) {
				$this->Session->setFlash(__('The feature has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The feature could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Feature.' . $this->Feature->primaryKey => $id));
			$this->request->data = $this->Feature->find('first', $options);
		}
		$docs = $this->Feature->Doc->find('list');
		$featureCats = $this->Feature->FeatureCat->find('list');
		$this->set(compact('docs', 'featureCats'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Feature->id = $id;
		if (!$this->Feature->exists()) {
			throw new NotFoundException(__('Invalid feature'));
		}
		$this->request->onlyAllow('feature', 'delete');
		if ($this->Feature->delete()) {
			$this->Session->setFlash(__('The feature has been deleted.'));
		} else {
			$this->Session->setFlash(__('The feature could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function isAuthorized($user) {
		// All registered users can add posts
		if ($this->action === 'add') {
			return true;
		}

		// The owner of a post can edit and delete it
		if (in_array($this->action, array('edit', 'delete'))) {
			$featureId = $this->request->params['pass'][0];
			if ($this->Feature->isOwnedBy($featureId, $user['id'])) {
				return true;
			}
		}

		return parent::isAuthorized($user);
	}
	
}
