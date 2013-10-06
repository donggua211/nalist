<?php

App::uses('AppController', 'Controller');

class AdminAppController extends AppController {
	public $components = array(
        'Session',
        'Auth' => array(
            'loginAction' => array('plugin' => 'admin', 'controller' => 'users', 'action' => 'login'),
            'loginRedirect' => array('plugin' => 'admin', 'controller' => 'entry', 'action' => 'index'),
            'logoutRedirect' => array('plugin' => 'admin', 'controller' => 'entry', 'action' => 'index'),
			'authorize' => array('Controller'),
        ),
    );

    public function beforeFilter() {
		
    }
	
	public function isAuthorized($user) {
		// Admin can access every action
		if (isset($user['role']) && $user['role'] === 'admin') {
			return true;
		}

		// Default deny
		return false;
	}
}
