<?php

App::uses('HtmlHelper', 'View/Helper');
class MyHtmlHelper extends HtmlHelper {
	public function url($url = null, $full = false) {
		if(is_array($url)){
			if(!isset($url['city']) && isset($this->params['city'])) {
				$url['city'] = $this->params['city'];
			}
			
			if(isset($url['controller']) && in_array($url['controller'], array('entry', 'pages', 'users'))) {
				unset($url['city']);
			}
		}
		
		return parent::url($url, $full);
	}
}