<?php

App::uses('TreeBehavior', 'Model/Behavior');

class TreePlusBehavior extends TreeBehavior {
	
	public function generateTreePlusList(Model $Model) {
		$list = $Model->find('threaded');
		
		$this->_generateDepth($Model, $list);
		
		return $list;
	}
	
	private function _generateDepth(Model $Model, &$list, $depth = 0) {
		$alias = $Model->alias;
		$depth ++;
		foreach($list as $key => &$val) {
			$val[$alias]['depth'] = $depth;
			
			if(isset($val['children']) && !empty($val['children'])) {
				$this->_generateDepth($Model, $val['children'], $depth);
			}
		}
	}
}