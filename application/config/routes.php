<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');
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

$route['default_controller'] = "guest/pages/index";
$route['404_override'] = '';

//Route guest user
$route['login'] = 'guest/users/login';
$route['logout'] = 'guest/users/logout';
$route['register'] = 'guest/users/register';
$route['activation/(:any)'] = 'guest/users/activation/$1';
$route['activation-by-code'] = 'guest/users/activation_by_code';
$route['reset-password'] = 'guest/users/reset_password';
$route['set-new-password/(:any)'] = 'guest/users/set_new_password/$1';

//Route page
$route['home'] = 'guest/pages/index';
$route['about-us'] = 'guest/pages/about';
$route['feature'] = 'guest/pages/feature';
$route['company'] = 'guest/pages/company';
$route['member'] = 'guest/pages/member';
$route['contact'] = 'guest/pages/contact';



/* End of file routes.php */
/* Location: ./application/config/routes.php */