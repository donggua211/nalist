<?php

App::uses('TreeBehavior', 'Model/Behavior');

class TreePlusBehavior extends TreeBehavior {
	
	public function generateTreePlusList(Model $Model) {
		$list = $Model->find('threaded');
		
		$this->_generateDepth($Model, $list);
		
		return $list;
	}
	
	private function _generateDepth(Model $Model, &$list) {
		$alias = $Model->alias;
		foreach($list as $key => &$val) {
			$val[$alias]['depth'] = count($this->getPath($Model, $val[$alias]['id'], array('id')));
			
			if(isset($val['children']) && !empty($val['children'])) {
				$this->_generateDepth($Model, $val['children']);
			}
		}
	}
}