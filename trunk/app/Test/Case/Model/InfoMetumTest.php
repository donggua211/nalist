<?php
App::uses('InfoMetum', 'Model');

/**
 * InfoMetum Test Case
 *
 */
class InfoMetumTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.info_metum',
		'app.info',
		'app.area',
		'app.category',
		'app.filter',
		'app.filter_option',
		'app.categories_filter',
		'app.info_filter',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->InfoMetum = ClassRegistry::init('InfoMetum');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->InfoMetum);

		parent::tearDown();
	}

}
