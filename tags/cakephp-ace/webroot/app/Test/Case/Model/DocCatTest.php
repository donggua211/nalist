<?php
App::uses('DocCat', 'Model');

/**
 * DocCat Test Case
 *
 */
class DocCatTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.doc_cat',
		'app.doc',
		'app.docs_doc_cat',
		'app.feature',
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
		$this->DocCat = ClassRegistry::init('DocCat');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DocCat);

		parent::tearDown();
	}

}
