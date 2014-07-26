<?php
/**
 * InfoFilterFixture
 *
 */
class InfoFilterFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'info_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'filter_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'value' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'info_id' => 1,
			'filter_id' => 1,
			'value' => 'Lorem ipsum dolor sit amet'
		),
	);

}
