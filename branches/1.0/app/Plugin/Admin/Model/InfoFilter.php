<?php
/**
 * InfoFilter Model
 *
 * @property Info $Info
 * @property Filter $Filter
 */
class InfoFilter extends AdminAppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'info_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'filter_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'value' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Info' => array(
			'className' => 'Admin.Info',
			'foreignKey' => 'info_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Filter' => array(
			'className' => 'Admin.Filter',
			'foreignKey' => 'filter_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
