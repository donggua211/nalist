<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/***********************************************
 * Constant text functions
 ***********************************************/
function text_filter_type($index = false) {
	$text = array(
		'select' => 'select',
		'radio' => 'radio',
		'checkbox' => 'checkbox',
		'text' => 'text',
		'number' => 'number',
	);
	
	return _text_acquirer($index, $text);
}

function _text_acquirer($index, $array) {
	if($index === false) {
		return $array;
	} elseif(is_array($index)) {
		$result = array();
		foreach($index as $key) {
			$result[] = _text_acquirer($key, $array);
		}
		return $result;
	} else {
		return (isset($array[$index])) ? $array[$index] : '';
	}
}