<?php

App::uses('AppController', 'Controller');

class AdminAppController extends AppController {
	
	public $theme = 'default';
	
	public $components = array(
        'Session',
        'Auth' => array(
            'loginAction' => array('plugin' => 'admin', 'controller' => 'admin_users', 'action' => 'login'),
            'loginRedirect' => array('plugin' => 'admin', 'controller' => 'entry', 'action' => 'index'),
            'logoutRedirect' => array('plugin' => 'admin', 'controller' => 'admin_users', 'action' => 'login'),
			'authenticate' => array(
				'Form' => array(
					'userModel' => 'AdminUser',
            )
        )
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
		return true;
	}
}
