<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "home";
$route['404_override'] = '';

//City List
$route['city'] = 'home/city_list';


//Set router for City.
if(file_exists(FCPATH.'.area_route')) {
	$content = file_get_contents(FCPATH.'.area_route');
	if (!empty($content)) {
		$route_setting = explode(',', $content);
		
		//Category
		$category_setting = array();
		if(file_exists(FCPATH.'.category_route')) {
			$category_content = file_get_contents(FCPATH.'.category_route');
			if (!empty($category_content)) {
				$category_setting = explode(',', $category_content);
			}
		}
		
		foreach($route_setting as $val) {
			$route[$val] = 'home/index/'.$val;
			$route[$val.'/([^\/]+)'] = '$1/index/'.$val;
			
			foreach($category_setting as $val2) {
				$route[$val.'/'.$val2] = 'info/info_list/'.$val2.'/'.$val;
				$route[$val.'/'.$val2.'/(:any)'] = 'info/info_list/'.$val2.'/$1/'.$val;
			}
			
			$route[$val.'/(:any)'] = '$1/'.$val;
		}
	}
}

/* End of file routes.php */
/* Location: ./application/config/routes.php */