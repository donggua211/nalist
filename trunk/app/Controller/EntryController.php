<?php
App::uses('AppController', 'Controller');

/**
  * Entry Controller is the default controller.
 */

class EntryController extends AppController {
	
	//city
	public $city = '';
	
	//Default List entry page. Will Check client IP.
	public function index() {
		$this->loadModel('Area');
		$areasList = $this->Area->find('threaded', array(
			'fields' => array('id', 'areaname', 'parent_id')
		));
		
		pr($areasList);
		
		
		
		
	}
	
	public function city() {
		pr($this->request);
	}
	

	private function _setCity() {
		
		//Check $this->request->params['city'] first.
		$this->city = $this->request->param('city');
		
		if(!empty($this->city))
			return true;
		
		//If request params does not set city, then, check it from Geoip Plugin.
		App::uses('GeoIpLocation', 'GeoIp.Model');
		$GeoIpLocation = new GeoIpLocation();
		$ip = $this->request->clientIp(false);
		$location = $GeoIpLocation->find($ip);
		
		//If GeoIP cannot find or is not in US, then set default IP.
		if(!empty($location) && $location['GeoIpLocation']['country_code'] == 'US') {
			$this->city = $location['GeoIpLocation']['city'];
			$this->region = $location['GeoIpLocation']['region'];
		}

		if(!empty($this->city))
			return true;

		//Set city to default value.
		$geoip = Configure :: read('default.geoip.city');
		
		$this->Cookie->write('geo_info', $geoip);
	}

	//override redirect
	public function redirect( $url, $status = NULL, $exit = true ) {
		if (!isset($url['language']) && $this->Session->check('Config.language')) {
		$url['language'] = $this->Session->read('Config.language');
		}
		parent::redirect($url,$status,$exit);
	}
}
