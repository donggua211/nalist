<?php
App::uses('Info', 'Model');

/**
 * Info Test Case
 *
 */
class InfoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		$this->Info = ClassRegistry::init('Info');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Info);

		parent::tearDown();
	}

}
