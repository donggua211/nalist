<?php
/**
 * UserLogs Controller
 *
 * @property UserLog $UserLog
 * @property PaginatorComponent $Paginator
 */
class UserLogsController extends AdminAppController {

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
		$this->UserLog->recursive = 0;
		$this->set('userLogs', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->UserLog->exists($id)) {
			throw new NotFoundException(__('Invalid user log'));
		}
		$options = array('conditions' => array('UserLog.' . $this->UserLog->primaryKey => $id));
		$this->set('userLog', $this->UserLog->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UserLog->create();
			if ($this->UserLog->save($this->request->data)) {
				$this->Session->setFlash(__('The user log has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user log could not be saved. Please, try again.'));
			}
		}
		$users = $this->UserLog->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->UserLog->exists($id)) {
			throw new NotFoundException(__('Invalid user log'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UserLog->save($this->request->data)) {
				$this->Session->setFlash(__('The user log has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user log could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UserLog.' . $this->UserLog->primaryKey => $id));
			$this->request->data = $this->UserLog->find('first', $options);
		}
		$users = $this->UserLog->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->UserLog->id = $id;
		if (!$this->UserLog->exists()) {
			throw new NotFoundException(__('Invalid user log'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->UserLog->delete()) {
			$this->Session->setFlash(__('The user log has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user log could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
