<?php
include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'geoip.inc.php';
include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'Location.inc.php';

/**
 * GeoIP Location class
 */
class GeoIP
{
    /**
     * Container for data returned by the find method
     *
     * @var array
     * @access public
     */
    public $data = array();
	
    /**
     * Find
     *
     * @param string $ipAddr The IP Address for which to find the location.
     * @return mixed Array of location data or null if no location found.
     * @access public
     */
    public function find($type = 'first', $query = array())
    {
        $ipAddr = $type;
        $GeoIp = Net_GeoIP::getInstance(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'GeoIP.dat');
        try {
            $location = $GeoIp->lookupLocation($ipAddr);
            if (!empty($location)) {
                $this->data = array(
                    'country_code' => $location->countryCode,
                    'country_code_3' => $location->countryCode3,
                    'country_name' => $location->countryName,
                    'region' => $location->region,
                    'city' => $location->city,
                    'postal_code' => $location->postalCode,
                    'latitude' => $location->latitude,
                    'longitude' => $location->longitude,
                    'area_code' => $location->areaCode,
                    'dma_code' => $location->dmaCode
                );
            }
        } catch (Exception $e) {
            return null;
        }
        return $this->data;
    }
}
