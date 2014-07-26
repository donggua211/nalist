<?php
App::uses('InfoFilter', 'Model');

/**
 * InfoFilter Test Case
 *
 */
class InfoFilterTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.info_filter',
		'app.info',
		'app.area',
		'app.category',
		'app.filter',
		'app.filter_option',
		'app.categories_filter',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->InfoFilter = ClassRegistry::init('InfoFilter');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->InfoFilter);

		parent::tearDown();
	}

}
