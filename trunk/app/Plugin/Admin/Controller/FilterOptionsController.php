<?php
/**
 * FilterOptions Controller
 *
 * @property FilterOption $FilterOption
 * @property PaginatorComponent $Paginator
 */
class FilterOptionsController extends AdminAppController {

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
		$this->FilterOption->recursive = 0;
		$this->set('filterOptions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FilterOption->exists($id)) {
			throw new NotFoundException(__('Invalid filter option'));
		}
		$options = array('conditions' => array('FilterOption.' . $this->FilterOption->primaryKey => $id));
		$this->set('filterOption', $this->FilterOption->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FilterOption->create();
			if ($this->FilterOption->save($this->request->data)) {
				$this->Session->setFlash(__('The filter option has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The filter option could not be saved. Please, try again.'));
			}
		}
		$filters = $this->FilterOption->Filter->find('list');
		$this->set(compact('filters'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FilterOption->exists($id)) {
			throw new NotFoundException(__('Invalid filter option'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FilterOption->save($this->request->data)) {
				$this->Session->setFlash(__('The filter option has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The filter option could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FilterOption.' . $this->FilterOption->primaryKey => $id));
			$this->request->data = $this->FilterOption->find('first', $options);
		}
		$filters = $this->FilterOption->Filter->find('list');
		$this->set(compact('filters'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FilterOption->id = $id;
		if (!$this->FilterOption->exists()) {
			throw new NotFoundException(__('Invalid filter option'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->FilterOption->delete()) {
			$this->Session->setFlash(__('The filter option has been deleted.'));
		} else {
			$this->Session->setFlash(__('The filter option could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
