<?php
/*
 *Use case:Add this (EnumerableBehavior.php)  to app/Model/Behavior/
 *  -->in the Model add public $actsAs = array('Enumerable');     
 *  -->in the *_controller add $enumOptions = $this->Categorie->enumOptions('Section');
 *  -->in the view add print $this->Form->input('{db_field_name}', array('options' =>       $enumOptions, 'label' => 'here'));
 *
 *
 */
class EnumBehavior extends ModelBehavior {
/**
 * Fetches the enum type options for a specific field
 *
 * @param string $field 
 * @return void
 * @access public
 */
	function enumOptions(Model $Model, $field) {
		$enumOptions = array();
		$enumData = $Model->getColumnType($field);
		if (!empty($enumData)) {
			$enumData = preg_replace("/(enum|set)\('(.+?)'\)/", '\\2', $enumData);
			$options = explode("','", $enumData);

			foreach ($options as $option) {
				$enumOptions["$option"] = $option;
			}
		}
		return $enumOptions;
	}
}
