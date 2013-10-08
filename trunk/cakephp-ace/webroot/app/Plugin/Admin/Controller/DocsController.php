<?php

class DocsController extends AdminAppController {
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->set('docs', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Doc->exists($id)) {
			throw new NotFoundException(__('Invalid doc'));
		}
		$options = array('conditions' => array('Doc.' . $this->Doc->primaryKey => $id));
		$this->set('doc', $this->Doc->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			 $this->request->data['Doc']['user_id'] = $this->Auth->user('id');
			$this->Doc->create();
			if ($this->Doc->save($this->request->data)) {
				$this->Session->setFlash(__('The doc has been saved.'), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The doc could not be saved. Please, try again.'));
			}
		}
		$docCats = $this->Doc->DocCat->find('list');
		$features = $this->Doc->Feature->find('list');
		$this->set(compact('docCats', 'features'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Doc->exists($id)) {
			throw new NotFoundException(__('Invalid doc'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Doc->save($this->request->data)) {
				$this->Session->setFlash(__('The doc has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The doc could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Doc.' . $this->Doc->primaryKey => $id));
			$this->request->data = $this->Doc->find('first', $options);
		}
		$docCats = $this->Doc->DocCat->find('list');
		$features = $this->Doc->Feature->find('list');
		$this->set(compact('docCats', 'features'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Doc->id = $id;
		if (!$this->Doc->exists()) {
			throw new NotFoundException(__('Invalid doc'));
		}
		$this->request->onlyAllow('doc', 'delete');
		if ($this->Doc->delete()) {
			$this->Session->setFlash(__('The doc has been deleted.'));
		} else {
			$this->Session->setFlash(__('The doc could not be deleted. Please, try again.'));
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
			$docId = $this->request->params['pass'][0];
			if ($this->Doc->isOwnedBy($docId, $user['id'])) {
				return true;
			}
		}

		return parent::isAuthorized($user);
	}

}
