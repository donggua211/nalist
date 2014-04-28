<?php
App::uses('AppController', 'Controller');

/**
  * Entry Controller is the default controller.
 */

class EntryController extends AppController {
	
	//city
	public $city = '';
	
	//Default List entry page. Will Check client IP. If no ip match, will show cities list.
	public function index() {
		$this->loadModel('Area');
		
		$geoIp = $this->_getGeo();
		
		//Will show city list, if can not get geoIP info
		if($geoIp != false && $geoIp['country'] == 'us') {
			//Check geoIp from database.
			$areasList = $this->Area->find('all', array(
				'fields' => array('id', 'slug'),
				 'conditions' => array('Area.slug' => $geoIp['city'], 'Area.type' => 'city')
			));
			
			foreach($areasList as $area) {
				$areaPath = $this->Area->getPath($area['Area']['id']);
				
				if($areaPath[0]['Area']['slug'] == $geoIp['state']) {
					//Redirect to Level 2
					$this->redirect(array('city' => $areaPath[1]['Area']['slug'], 'action' => 'city'));
				}
			}
		}
		
		//Show city List page
		$areasList = $this->Area->generateTreePlusList();
		
		$this->set(compact('areasList'));
		
		$this->layout = 'entry_index';
	}
	
	//If specific a city, this is default City home page.
	public function city() {
		$this->city = $this->request->param('city');
	}
	
	//Check City from IP. If no IP match, return false;
	private function _getGeo() {
		//If request params does not set city, then, check it from Geoip Plugin.
		App::uses('GeoIpLocation', 'GeoIp.Model');
		$GeoIpLocation = new GeoIpLocation();
		$ip = $this->request->clientIp(false);
		$location = $GeoIpLocation->find($ip);
		
		//If geoIp cannot find or is not in US, then set default IP.
		if(empty($location)) {
			return false;
		}
		
		$geoIp['country'] = strtolower($location['GeoIpLocation']['country_code']);
		$geoIp['state'] = strtolower($location['GeoIpLocation']['region']);
		$geoIp['city'] = strtolower($location['GeoIpLocation']['city']);
		
		return $geoIp;
	}
}
