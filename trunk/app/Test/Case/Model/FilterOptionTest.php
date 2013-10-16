<?php
App::uses('FilterOption', 'Model');

/**
 * FilterOption Test Case
 *
 */
class FilterOptionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.filter_option',
		'app.filter',
		'app.category',
		'app.info',
		'app.area',
		'app.user',
		'app.info_filter',
		'app.categories_filter'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FilterOption = ClassRegistry::init('FilterOption');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FilterOption);

		parent::tearDown();
	}

}
