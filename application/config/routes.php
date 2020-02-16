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
/*$route = array(
    'default_controller' => 'main',
    'administrator' => 'administrator',
    'login' => 'login',
    'agenda' => 'agenda',
    'auth' => 'auth',
    'artikel' => 'artikel',
    'contact' => 'contact',
    'download' => 'download',
    'gallery' => 'gallery',
    'konfirmasi' => 'konfirmasi',
    'main' => 'main',
    'members' => 'members',
    'page' => 'page',
    'produk' => 'produk',
    'reseller' => 'reseller',
    'testimoni' => 'testimoni',
    'video' => 'video',
    'confirm' => 'confirm',
    'mulai' => 'mulai',
    'daftar' => 'auth/register',
    'login' => 'auth/login',
    'signout' => 'members/keluar',
    'kebijakan-privasi' => 'artikel/kebijakan',
    'survey' => 'main/survey',
);

$route['(:any)'] = 'ref/$1/$2';
$route['404_override'] = 'main/notfound';
$route['translate_uri_dashes'] = FALSE; */

switch ( $_SERVER['HTTP_HOST'] ) {
    case 'blog.nusaserver.com':
        $route['default_controller'] = "artikel";
        $route['artikel'] = "artikel";
        $route['page'] = "artikel/index";
        $route['(:any)'] = 'artikel/detail/$1';
    break;
    case 'auth.nusaserver.com':
        $route['default_controller'] = "auth/login";
        $route['daftar'] = "auth/register";
    break;
    default:
    $route = array(
        'default_controller' => 'main',
        'administrator' => 'administrator',
        'login' => 'login',
        'agenda' => 'agenda',
        'auth' => 'auth',
        'artikel' => 'artikel',
        'contact' => 'contact',
        'konfirmasi/kirim' => 'konfirmasi/aksikonfirmasi',
        'main' => 'main',
        'members' => 'members',
        'page' => 'page',
        'produk' => 'produk',
        'confirm' => 'confirm',
        'mulai' => 'mulai',
        'daftar' => 'auth/register/$1',
        'daftar/(:any)' => 'auth/register/$1',
        'login' => 'auth/login',
        'signout' => 'members/keluar',
        'kebijakan-privasi' => 'artikel/kebijakan',
        'survey' => 'main/survey',
        'blog/(:any)' => 'artikel/detail/$1',
        'confirm/(:any)/(:any)' => 'confirm/kode/$1/$2',
        'konfirmasi/(:any)' => 'konfirmasi/kodetrx/$1',
    );
    
    $route['(:any)'] = 'ref/$1/$2';
    $route['404_override'] = 'main/notfound';
    $route['translate_uri_dashes'] = FALSE;
}