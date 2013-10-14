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
		$this->helpers[] = 'Cat';
		$this->FeatureCat->recursive = 0;
		$this->set('featureCats', $this->FeatureCat->generateTreePlusList());
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
}
