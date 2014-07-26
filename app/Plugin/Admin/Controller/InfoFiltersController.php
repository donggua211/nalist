<?php
/**
 * InfoFilters Controller
 *
 * @property InfoFilter $InfoFilter
 * @property PaginatorComponent $Paginator
 */
class InfoFiltersController extends AdminAppController {

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
		$this->InfoFilter->recursive = 0;
		$this->set('infoFilters', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->InfoFilter->exists($id)) {
			throw new NotFoundException(__('Invalid info filter'));
		}
		$options = array('conditions' => array('InfoFilter.' . $this->InfoFilter->primaryKey => $id));
		$this->set('infoFilter', $this->InfoFilter->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->InfoFilter->create();
			if ($this->InfoFilter->save($this->request->data)) {
				$this->Session->setFlash(__('The info filter has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The info filter could not be saved. Please, try again.'));
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
		if (!$this->InfoFilter->exists($id)) {
			throw new NotFoundException(__('Invalid info filter'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->InfoFilter->save($this->request->data)) {
				$this->Session->setFlash(__('The info filter has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The info filter could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('InfoFilter.' . $this->InfoFilter->primaryKey => $id));
			$this->request->data = $this->InfoFilter->find('first', $options);
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
		$this->InfoFilter->id = $id;
		if (!$this->InfoFilter->exists()) {
			throw new NotFoundException(__('Invalid info filter'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->InfoFilter->delete()) {
			$this->Session->setFlash(__('The info filter has been deleted.'));
		} else {
			$this->Session->setFlash(__('The info filter could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
