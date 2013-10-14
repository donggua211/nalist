<?php
App::uses('Feature', 'Model');

/**
 * Feature Test Case
 *
 */
class FeatureTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.feature',
		'app.doc',
		'app.doc_cat',
		'app.docs_doc_cat',
		'app.docs_feature',
		'app.feature_cat',
		'app.features_feature_cat'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Feature = ClassRegistry::init('Feature');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Feature);

		parent::tearDown();
	}

}
