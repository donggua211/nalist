<?php
/**
 * AdminUsers Controller
 *
 * @property AdminUser $AdminUser
 * @property PaginatorComponent $Paginator
 */
class AdminUsersController extends AdminAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow();
		//$this->Auth->allow('add');
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->AdminUser->recursive = 0;
		$this->set('adminUsers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AdminUser->exists($id)) {
			throw new NotFoundException(__('Invalid admin user'));
		}
		$options = array('conditions' => array('AdminUser.' . $this->AdminUser->primaryKey => $id));
		$this->set('adminUser', $this->AdminUser->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AdminUser->create();
			if ($this->AdminUser->save($this->request->data)) {
				$this->Session->setFlash(__('The admin user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The admin user could not be saved. Please, try again.'));
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
		if (!$this->AdminUser->exists($id)) {
			throw new NotFoundException(__('Invalid admin user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AdminUser->save($this->request->data)) {
				$this->Session->setFlash(__('The admin user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The admin user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AdminUser.' . $this->AdminUser->primaryKey => $id));
			$this->request->data = $this->AdminUser->find('first', $options);
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
		$this->AdminUser->id = $id;
		if (!$this->AdminUser->exists()) {
			throw new NotFoundException(__('Invalid admin user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AdminUser->delete()) {
			$this->Session->setFlash(__('The admin user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The admin user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirect());
			}
			
			print_r($this->Auth);
			$this->Session->setFlash(__('Invalid username or password, try again'));
		}
		
		$this->layout = 'login';
	}

	public function logout() {
		return $this->redirect($this->Auth->logout());
	}
}
