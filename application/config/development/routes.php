<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'homepage';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

$route['thuc-don'] = "menu/index";
$route['thuc-don/(:any)'] = "menu/detail/$1";
$route['gioi-thieu'] = 'about/index/';
$route['gioi-thieu/(:any)'] = 'about/detail/$1';
$route['bai-viet'] = 'blogs/index/';
$route['bai-viet/(:num)'] = 'blogs/index/$1';
$route['bai-viet/chi-tiet/(:any)'] = 'blogs/detail/$1';
$route['(:any)/danh-sach'] = "blogs/category/$1";
// $route['(:any)/chi-tiet/(:any)'] = "blogs/detail/$2";

if($this->uri->segment(1) == "admin"){
	$route['admin'] = 'admin/user/login';
}

// $route['^vi/(.+)$'] = "$1";
// $route['^en/(.+)$'] = "$1";
// $route['^cn/(.+)$'] = "$1";

// $route['^vi$'] = $route['default_controller'];
// $route['^en$'] = $route['default_controller'];
// $route['^cn$'] = $route['default_controller'];



//else{
//	$route['([a-zA-Z0-9-_]+)'] = 'test/index/$1';
//	$route['([a-zA-Z0-9-_]+)/([a-zA-Z0-9-_]+)'] = 'test/index/$1/$2';
//}
