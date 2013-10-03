<?php
App::uses('ContactManagerAppController', 'ContactManager.Controller');
/**
 * Contacts Controller
 *
 */
class ContactsController extends ContactManagerAppController {

/**
 * Scaffold
 *
 * @var mixed
 */
	public $scaffold;

	public $uses = array('ContactManager.Contact');
	
	public function index() {
	//...
	}
}
