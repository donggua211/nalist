<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//page nav function
function page_nav($total, $pagesize, $current_page)
{
	$total_page = floor( $total / $pagesize);
	if( $current_page > $total_page ) $current_page = $total_page;
	if( $current_page < 1 ) $current_page = 1;

	$page_nav = array();	
	$page_nav['total'] = $total;
	$page_nav['total_page'] = ($total_page == 0) ? 1 : $total_page;
	$page_nav['last_page'] = ($total_page == 0) ? 1 : $total_page;
	$page_nav['start'] = ( $current_page - 1 ) * $pagesize;
	$page_nav['end'] = ($current_page == $page_nav['total_page']) ? $pagesize * 2: $pagesize;
	$page_nav['next'] = ( $current_page < $total_page ) ? $current_page + 1 : $total_page;
	$page_nav['previous'] = ( $current_page > 1 ) ? $current_page - 1 : 1;
	$page_nav['current_page'] = $current_page;
	$page_nav['pagesize'] = $pagesize;

	//record start num. different from start, which is mysql record start num
	$page_nav['r_start'] = ($page_nav['start'] + 1);
	$page_nav['r_end'] = ( $page_nav['current_page'] == $page_nav['total_page'] ) ? $page_nav['total'] : $page_nav['start'] + $page_nav['pagesize'];
	if($page_nav['r_end'] == 0) $page_nav['r_start']= 0;
	
	return $page_nav;
}

//Parse URL filter string into array.
//$type: the type of each value, can be: int, string, date
//$default: default value of each value.
function parse_filter($filter_config = array())
{
	if(empty($filter_config))
		return array();
	
	$result = array();
	$CI =& get_instance();
	foreach($filter_config as $key => $config)
	{
		$type = $config['type'];
		$default = $config['default'];
		
		$value = $CI->input->get_post($key, TRUE);
		
		//if val is '' and default val is '', then skip. else, set value to default
		if($value == '')
		{
			if($default == '')
				continue;
			else
				$value = $default;
		}
		
		
		switch($type)
		{
			case 'int':
				if(!is_numeric($value))
					continue 2;
				$value = intval($value);
				break;
			case 'double':
				if(!is_numeric($value))
					continue 2;
				break;
			case 'string':
				$value = trim($value);
				break;
			case 'date':
				if(!check_date($value))
					continue 2;
				break;
		}
		
		$result[$key] = $value;
	}
	
	return $result;
}

/*
  Debug Functions.
*/
function pr($val) {
	echo '<pre>';
	if(empty($val)) {
		var_dump($val);
	} else {
		print_r($val);
	}
	echo '</pre>';
	echo '<hr/>';
}


/*
  Common Functions.
*/
function get_current_uri() {
	static $uri = null;
	
	if ($uri === null) {
		$CI =& get_instance();
		
		$class = $CI->router->fetch_class();
		$method = $CI->router->fetch_method();
		$uri = "$class/$method";
	}
	
	return $uri;
}

function array_2_tree(&$array) {
	$map = array(
		0 => array('children' => array())
	);

	foreach ($array as &$val) {
		$val['children'] = array();
		$map[$val['id']] = &$val;
	}

	foreach ($array as &$val) {
		$map[$val['parent_id']]['children'][$val['id']] = &$val;
	}

	return $map[0]['children'];
}

function generate_slug($title) {
	$title = strtolower($title);
	$title = preg_replace('/&.+?;/', '', $title); // kill entities
	$title = str_replace('.', '-', $title);
	
	$title = preg_replace('/[^%a-z0-9 _-]/', '', $title);
	$title = preg_replace('/\s+/', '-', $title);
	$title = preg_replace('|-+|', '-', $title);
	$title = trim($title, '-');

	return $title;
}

/*
 Common Template Functions
*/
function template_select($array, $display_field = FALSE, $selected = '', $select_id, $top_option = FALSE) {
	echo '<select name="'.$select_id.'">';
		if($top_option !== FALSE) {
			echo '<option value="">'.$top_option.'</option>';
		}
		
		foreach($array as $key => $val) {
			if(empty($display_field)) {
				$display = $val;
			} else {
				$display = $val[$display_field];
			}
			echo '<option value="'.$key.'" '.($selected ==  $key ? 'SELECTED' : '').' >'.$display.'</option>';
		}
		
	echo '</select>';
}

function template_tree_select($array, $display_field, $selected = '', $select_id = 'parent_id', $top_option = FALSE) {
	echo '<select name="'.$select_id.'">';
		if($top_option !== FALSE) {
			echo '<option value="">'.$top_option.'</option>';
		}
		
		_template_tree_deep($array, $display_field, $selected);
		
	echo '</select>';
}

function _template_tree_deep($array, $display_field, $selected = '', $depth = 0) {
	$depth ++;
	foreach($array as $key => $val) {
		$prefix = '';
		for($i = 1; $i < $depth; $i++) {
			$prefix .= ($i == 1 ? '┗' : '').'━';
		}
		echo '<option value="'.$key.'" '.($selected ==  $key ? 'SELECTED' : '').' >'.$prefix.$val[$display_field].'</option>';
		
		if(isset($val['children']) && !empty($val['children'])) {
			_template_tree_deep($val['children'], $display_field, $selected, $depth);
		}
	}
}

function template_tree_list($array, $display_field, $option_links = false, $depth = 0) {
	$depth ++;
	foreach($array as $key => $val) {
		$prefix = '';
		for($i = 1; $i < $depth; $i++) {
			$prefix .= ($i == 1 ? '┗' : '').'━';
		}
		echo '<tr>';
		$index = 0;
		foreach($display_field as $display_key) {
			echo "<td>".($index == 0 ? $prefix : '')."{$val[$display_key]}</td>\n";
			$index ++;
		}
		
		if($option_links !== FALSE && is_array($option_links)) {
			echo '<td class="center">';
			$total = count($option_links);
			$count = 1;
			foreach($option_links as $option_link) {
				echo '<a href="'.site_url($option_link['uri']).'/'.$val['id'].'" '.(isset($option_link['class']) ? ' class="'.$option_link['class'].'" ' : '').'>'.$option_link['text'].'</a>';
				
				if($count < $total) {
					echo ' | ';
				}
				$count ++;
			}
			echo '</td>';
		}
		echo '</tr>';
		
		if(isset($val['children']) && !empty($val['children'])) {
			template_tree_list($val['children'], $display_field, $option_links, $depth);
		}
	}
}
