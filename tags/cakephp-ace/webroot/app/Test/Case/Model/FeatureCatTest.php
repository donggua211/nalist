<?php
App::uses('FeatureCat', 'Model');

/**
 * FeatureCat Test Case
 *
 */
class FeatureCatTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.feature_cat',
		'app.feature',
		'app.doc',
		'app.doc_cat',
		'app.docs_doc_cat',
		'app.docs_feature',
		'app.features_feature_cat'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FeatureCat = ClassRegistry::init('FeatureCat');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FeatureCat);

		parent::tearDown();
	}

}
