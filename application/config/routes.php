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
|	http://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['dang-san-pham.html'] = 'dangsanpham';
$route['dang-nhap.html'] = 'dangnhap';
$route['dang-ki.html'] = 'dangki';
$route['thong-tin-ca-nhan.html'] = 'dangki/update';
$route['sua-thong-tin.html'] = 'dangki/edit';

$route['gio-hang.html'] = 'giohang';

$route['dang-san-pham.html'] = 'dangsanpham';

$route['dang-ki-gian-hang.html'] = 'store';
$route['san-pham/(:num).html'] = 'home/sanpham/$1';

$route['danh-muc-(:num).html'] = 'danhmuc/get/$1';
$route['danh-muc-(:num)-(:num).html'] = 'danhmuc/get/$1/$2';

$route['all-store.html'] = 'store/all_store';
$route['my-store.html'] = 'store/panel_store/$1';
$route['sua-san-pham-(:any).html'] = 'dangsanpham/edit/$1';
$route['danh-muc-gian-hang-(:num).html'] = 'store/store_danhmuc/$1';
$route['gian-hang-(:num).html'] = 'store/my_store/$1';

$route['tin-tuc.html'] = 'tintuc';
$route['tin-tuc-(:num).html'] = 'tintuc/chitiet_tintuc/$1';
//$route['admin/tintuc/(:any)'] = "admin/tintuc/test2/$1";