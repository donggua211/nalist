<?php

App::uses('Component', 'Controller');


class GeoipComponent extends Component {
	public $components = array('Cookie');
	
	private $geo_info = array();
	
    public function initialize(Controller $controller) {
		
		//Get geo info from cookie.
		$this->geo_info = $controller->Cookie->read('geo_info');
		
		//If cookie is not set, then get from GeoIp Plugin.
		if(empty($this->geo_info)) {
			App::uses('GeoIpLocation', 'GeoIp.Model');
			$GeoIpLocation = new GeoIpLocation();
			$ip = $controller->request->clientIp(false);
			$location = $GeoIpLocation->find($ip);
			
			//If GeoIP cannot find or is not in US, then set default IP.
			if(!empty($location) && $location['GeoIpLocation']['country_code'] == 'US') {
				$geoip = array(
					'state' => $location['GeoIpLocation']['region'],
					'city' => $location['GeoIpLocation']['city'],
				);
			} else {
				$geoip = Configure :: read('geoip.default');
			}
			
			$this->Cookie->write('geo_info', $geoip);
		}
    }
}