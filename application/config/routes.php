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
$route['default_controller'] = 'action';
$route['404_override'] = 'page_not_found';
$route['translate_uri_dashes'] = FALSE;

$route['pinjaman'] = 'action/pinjaman';
$route['pinjammanual'] = 'action/pinjamanadmin';
$route['kirim/ulangpinjaman/(:any)'] = 'action/ulangpinjaman';
$route['setoran'] = 'action/setoran';
$route['login'] = 'action/login';
$route['register'] = 'action/register';
$route['simpanan'] = 'action/sim_pokok';
$route['cetak_simpanan/(:any)'] = 'action/cetak_sim';
$route['new_user'] = 'action/newuser';
$route['data_simpan'] = 'action/datasimpan';
$route['data_pinjam'] = 'action/datapinjamadmin';
$route['bayar/pinjaman'] = 'action/dataPinjam';
$route['bayar/pinjaman/(:any)'] = 'action/bayarpinjam';
$route['logout'] = 'action/logout';;
$route['profile'] = 'action/profile';
$route['setting'] = 'action/setting';

$route['report'] = 'action/report';
$route['report/simpan'] = 'action/reportSimpan';
$route['report/user'] = 'action/reportUser';

//Nggak di pakai Biarin aja ya
$route['sim_wajib'] = 'action/sim_wajib';
$route['sim_suka'] = 'action/sim_suka';
