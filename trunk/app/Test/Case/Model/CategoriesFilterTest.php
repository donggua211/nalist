<?php
App::uses('CategoriesFilter', 'Model');

/**
 * CategoriesFilter Test Case
 *
 */
class CategoriesFilterTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.categories_filter',
		'app.category',
		'app.info',
		'app.area',
		'app.user',
		'app.filter',
		'app.filter_option',
		'app.info_filter'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CategoriesFilter = ClassRegistry::init('CategoriesFilter');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CategoriesFilter);

		parent::tearDown();
	}

}
