<?php

App::uses('Component', 'Controller');
App::uses('GeoIpLocation', 'GeoIp.Model');

class GeoipComponent extends Component {

    public function __construct(ComponentCollection $collection) {
		$this->controller = $collection->getController();
		
		$GeoIpLocation = new GeoIpLocation();
		$ipAddr = $this->controller->request->clientIp(false);
		$location = $GeoIpLocation->find('47.153.191.255');
		
		pr($ipAddr);
		pr($location);
	
    }
}