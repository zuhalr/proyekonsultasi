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
$route['default_controller'] = 'front/page';
$route['404_override'] = 'front/page/not_found';
$route['translate_uri_dashes'] = FALSE;

$route['cms'] = 'cms/dashboard';

// authenticate
$route['signin'] = 'users/auth/login';
$route['bye'] = 'users/auth/logout';
$route['signout'] = 'users/auth/logout';
$route['signinForum'] = 'users/auth/login_forum';
$route['signoutForum'] = 'users/auth/logout_forum';

// users route
$route['cms/users'] = 'cms/users/index';
$route['cms/users/tambah'] = 'cms/users/create_user';
$route['cms/users/edit/(:num)'] = 'cms/users/edit_user/$1';
$route['cms/users/delete/(:num)'] = 'cms/users/edit_user/$1';
$route['cms/usersdeactivate/(:num)'] = 'cms/users/deactivate/$1';
$route['cms/users/group/(:num)'] = 'cms/users/edit_group/$1';
$route['cms/users/create'] = 'cms/users/create_group';

// product
$route['cms/product'] = 'cms/product/index';
$route['cms/product/out'] = 'cms/product/out';
$route['cms/product/compose'] = 'cms/product/compose';
$route['cms/product/edit/(:any)'] = 'cms/product/edit/$1';
$route['cms/product/update'] = 'cms/product/update';
$route['cms/product/creates'] = 'cms/product/creates';
$route['cms/product/grid'] = 'cms/product/grid';
$route['cms/product/status/(:any)'] = 'cms/product/status/$1';
$route['cms/product/promote/(:any)'] = 'cms/product/promote/$1';
$route['cms/product/delete/(:any)'] = 'cms/product/delete/$1';
$route['cms/product/(:any)'] = 'cms/product/index/$1';
$route['cms/product/out/(:any)'] = 'cms/product/out/$1';

// posts
$route['cms/posts'] = 'cms/posts/index';
$route['cms/posts/compose'] = 'cms/posts/compose';
$route['cms/posts/edit/(:any)'] = 'cms/posts/edit/$1';
$route['cms/posts/update'] = 'cms/posts/update';
$route['cms/posts/creates'] = 'cms/posts/creates';
$route['cms/posts/status/(:any)'] = 'cms/posts/status/$1';
$route['cms/posts/delete/(:any)'] = 'cms/posts/delete/$1';
$route['cms/posts/(:any)'] = 'cms/posts/index/$1';

// pages
$route['cms/pages'] = 'cms/pages/index';
$route['cms/pages/compose'] = 'cms/pages/compose';
$route['cms/pages/edit/(:any)'] = 'cms/pages/edit/$1';
$route['cms/pages/update'] = 'cms/pages/update';
$route['cms/pages/creates'] = 'cms/pages/creates';
$route['cms/pages/status/(:any)'] = 'cms/pages/status/$1';
$route['cms/pospagests/delete/(:any)'] = 'cms/pages/delete/$1';
$route['cms/pages/(:any)'] = 'cms/pages/index/$1';

// finish
$route['cms/categories'] = 'cms/categories/index';
$route['cms/categories/update'] = 'cms/categories/update';
$route['cms/categories/create'] = 'cms/categories/create';
$route['cms/categories/status/(:any)'] = 'cms/categories/status/$1';
$route['cms/categories/delete/(:any)'] = 'cms/categories/delete/$1';
$route['cms/categories/(:any)'] = 'cms/categories/index/$1';

// contact
$route['cms/contact'] = 'cms/contact/index';
$route['cms/contact/delete/(:any)'] = 'cms/contact/delete/$1';
$route['cms/contact/(:any)'] = 'cms/contact/index/$1';

// procat
$route['cms/procat'] = 'cms/procat/index';
$route['cms/procat/update'] = 'cms/procat/update';
$route['cms/procat/creates'] = 'cms/procat/creates';
$route['cms/procat/status/(:any)'] = 'cms/procat/status/$1';
$route['cms/procat/delete/(:any)'] = 'cms/procat/delete/$1';
$route['cms/procat/(:any)'] = 'cms/procat/index/$1';



// client
$route['cms/client'] = 'cms/client/index';
$route['cms/client/update'] = 'cms/client/update';
$route['cms/client/compose'] = 'cms/client/compose';
$route['cms/client/creates'] = 'cms/client/creates';
$route['cms/client/status/(:any)'] = 'cms/client/status/$1';
$route['cms/client/delete/(:any)'] = 'cms/client/delete/$1';
$route['cms/client/(:any)'] = 'cms/client/index/$1';


// settings/general
$route['cms/settings/general'] = 'cms/settings/general';
$route['cms/settings/general/update'] = 'cms/settings/general/update';

// settings/mail
$route['cms/settings/mail'] = 'cms/settings/mail';
$route['cms/settings/mail/update'] = 'cms/settings/mail/update';

// front end
$route['posts'] = 'front/posts';
$route['posts/(:any)'] = 'front/posts/$1';

// $route['page/(:any)'] = 'front/page/$1';
$route['page/(:any)/(:any)'] = 'front/page/page_read/$1/$2';
$route['pages/(:any)'] = 'front/page/menu/$1/$2';




$route['pakpos'] = 'front/page/contact_post';


$route['client'] = 'front/page/client';



$route['imageUpload'] = 'api/imageUpload/index';
$route['imageUploadForum'] = 'api/imageUpload/image_forum';




// message
$route['cms/message'] = 'cms/message/index';
$route['cms/message/view/(:any)'] = 'cms/message/view/$1';
$route['cms/message/(:any)'] = 'cms/message/index/$1';
$route['cms/message/delete/(:any)'] = 'cms/message/delete/$1';







// galeri
$route['cms/galeri'] = 'cms/galeri/index';
$route['cms/galeri/out'] = 'cms/galeri/out';
$route['cms/galeri/compose'] = 'cms/galeri/compose';
$route['cms/galeri/edit/(:any)'] = 'cms/galeri/edit/$1';
$route['cms/galeri/update'] = 'cms/galeri/update';
$route['cms/galeri/creates'] = 'cms/galeri/creates';
$route['cms/galeri/grid'] = 'cms/galeri/grid';
$route['cms/galeri/status/(:any)'] = 'cms/galeri/status/$1';
$route['cms/galeri/promote/(:any)'] = 'cms/galeri/promote/$1';
$route['cms/galeri/delete/(:any)'] = 'cms/galeri/delete/$1';
$route['cms/galeri/(:any)'] = 'cms/galeri/index/$1';
$route['cms/galeri/out/(:any)'] = 'cms/galeri/out/$1';


// video
$route['cms/video'] = 'cms/video/index';
$route['cms/video/out'] = 'cms/video/out';
$route['cms/video/compose'] = 'cms/video/compose';
$route['cms/video/edit/(:any)'] = 'cms/video/edit/$1';
$route['cms/video/update'] = 'cms/video/update';
$route['cms/video/creates'] = 'cms/video/creates';
$route['cms/video/grid'] = 'cms/video/grid';
$route['cms/video/status/(:any)'] = 'cms/video/status/$1';
$route['cms/video/promote/(:any)'] = 'cms/video/promote/$1';
$route['cms/video/delete/(:any)'] = 'cms/video/delete/$1';
$route['cms/video/(:any)'] = 'cms/video/index/$1';
$route['cms/video/out/(:any)'] = 'cms/video/out/$1';


// harga
$route['cms/harga'] = 'cms/harga/index';
$route['cms/harga/out'] = 'cms/harga/out';
$route['cms/harga/compose'] = 'cms/harga/compose';
$route['cms/harga/edit/(:any)'] = 'cms/harga/edit/$1';
$route['cms/harga/update'] = 'cms/harga/update';
$route['cms/harga/creates'] = 'cms/harga/creates';
$route['cms/harga/grid'] = 'cms/harga/grid';
$route['cms/harga/status/(:any)'] = 'cms/harga/status/$1';
$route['cms/harga/promote/(:any)'] = 'cms/harga/promote/$1';
$route['cms/harga/delete/(:any)'] = 'cms/harga/delete/$1';
$route['cms/harga/(:any)'] = 'cms/harga/index/$1';
$route['cms/harga/out/(:any)'] = 'cms/harga/out/$1';



// faqs
$route['cms/faqs'] = 'cms/faqs/index';
$route['cms/faqs/out'] = 'cms/faqs/out';
$route['cms/faqs/compose'] = 'cms/faqs/compose';
$route['cms/faqs/edit/(:any)'] = 'cms/faqs/edit/$1';
$route['cms/faqs/update'] = 'cms/faqs/update';
$route['cms/faqs/creates'] = 'cms/faqs/creates';
$route['cms/faqs/grid'] = 'cms/faqs/grid';
$route['cms/faqs/status/(:any)'] = 'cms/faqs/status/$1';
$route['cms/faqs/promote/(:any)'] = 'cms/faqs/promote/$1';
$route['cms/faqs/delete/(:any)'] = 'cms/faqs/delete/$1';
$route['cms/faqs/(:any)'] = 'cms/faqs/index/$1';
$route['cms/faqs/out/(:any)'] = 'cms/faqs/out/$1';


// siteplan
$route['cms/siteplan'] = 'cms/siteplan/index';
$route['cms/siteplan/out'] = 'cms/siteplan/out';
$route['cms/siteplan/compose'] = 'cms/siteplan/compose';
$route['cms/siteplan/edit/(:any)'] = 'cms/siteplan/edit/$1';
$route['cms/siteplan/update'] = 'cms/siteplan/update';
$route['cms/siteplan/creates'] = 'cms/siteplan/creates';
$route['cms/siteplan/grid'] = 'cms/siteplan/grid';
$route['cms/siteplan/status/(:any)'] = 'cms/siteplan/status/$1';
$route['cms/siteplan/promote/(:any)'] = 'cms/siteplan/promote/$1';
$route['cms/siteplan/delete/(:any)'] = 'cms/siteplan/delete/$1';
$route['cms/siteplan/(:any)'] = 'cms/siteplan/index/$1';
$route['cms/siteplan/out/(:any)'] = 'cms/siteplan/out/$1';


// data klien
$route['cms/klien'] = 'cms/klien/index';
$route['cms/klien/out'] = 'cms/klien/out';
$route['cms/klien/compose'] = 'cms/klien/compose';
$route['cms/klien/edit/(:any)'] = 'cms/klien/edit/$1';
$route['cms/klien/update'] = 'cms/klien/update';
$route['cms/klien/creates'] = 'cms/klien/creates';
$route['cms/klien/grid'] = 'cms/klien/grid';
$route['cms/klien/status/(:any)'] = 'cms/klien/status/$1';
$route['cms/klien/promote/(:any)'] = 'cms/klien/promote/$1';
$route['cms/klien/delete/(:any)'] = 'cms/klien/delete/$1';
$route['cms/klien/(:any)'] = 'cms/klien/index/$1';
$route['cms/klien/out/(:any)'] = 'cms/klien/out/$1';












