<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'BabyName';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['name_combine'] = 'BabyName/name_combine';
$route['name_list'] = 'BabyName/name_list';
$route['name_search'] = 'BabyName/name_search';
$route['favourite_name'] = 'BabyName/favourite_name';
$route['language/(:any)'] = 'BabyName/name/$1';
$route['language/(:any)/(:any)/(:any)'] = 'BabyName/all_name_by_letter/$1/$2/$3';
$route['single_name/(:any)/(:any)/(:any)'] = 'BabyName/single_name/$1/$2/$3';
$route['name_search/(:any)/(:any)/(:any)'] = 'BabyName/name_search_from_cookie/$1/$2/$3';
$route['name_combine/(:any)/(:any)/(:any)/(:any)'] = 'BabyName/name_combine_from_cookie/$1/$2/$3/$4';


$route['privacy'] = 'BabyName/privacy';
$route['contact'] = 'BabyName/contact';
$route['name_like'] = 'BabyName/name_like';
$route['name_dislike'] = 'BabyName/name_dislike';
