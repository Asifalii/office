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
$route['default_controller'] = 'NewspaperList';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['newspaper/(:any)'] = '/NewspaperList/getNewspaperByCountry/$1';
$route['submit_newspaper'] = 'NewspaperList/submit';
$route['contact'] = 'NewspaperList/contact';
$route['privacy'] = 'NewspaperList/privacy';
$route['disclaimer'] = 'NewspaperList/disclaimer';
$route['admin_login'] = 'ControlPanel';
$route['dashboard'] = 'ControlPanel/dashboard';
$route['pending_item'] = 'ControlPanel/pending_item';
$route['approve_item/(:any)'] = 'ControlPanel/approve_item/$1';
$route['edit_item/(:any)'] = 'ControlPanel/edit_item/$1';
$route['item_list'] = 'ControlPanel/item_list';
$route['add_item'] = 'ControlPanel/add_item';
$route['edit_item/(:any)'] = '/ControlPanel/edit_item/$1';
$route['logout'] = 'ControlPanel/user_logout';
$route['getNewspaperByCountry/(:any)'] = 'Api/getNewspaperByCountry/$1';
$route['saveNewspaper'] = 'Api/saveNewspaper';
$route['getNewspaperByCountryWithLimit/(:any)/(:any)'] = 'Api/getNewspaperByCountryWithLimit/$1/$2';
$route['getItem/(:any)/(:any)'] = 'Api/getItemByParam/$1/$2';
$route['news'] = 'NewspaperList/newsList';
$route['upload/(:any)'] = 'ControlPanel/upload/$1';
$route['favicon'] = 'NewspaperList/saveFavicon';
$route['getNews'] = 'NewspaperList/getNews';
$route['getNewsPaper'] = 'NewspaperList/getNewsPaper';
$route['getNewsList'] = 'NewspaperList/getNewsList';
$route['cache'] = 'NewspaperList/cache';

