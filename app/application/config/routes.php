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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


/**
 * Define API Routes
 */
$route['simple'] = 'user_api/simple_api';
$route['limit'] = 'user_api/api_limit';
$route['key'] = 'user_api/api_key';


$route['user/login'] = 'user_api/login';
$route['user/view'] = 'user_api/view';
$route['user/category_list'] = 'user_api/allCategories';
$route['user/subcategory_list'] = 'user_api/subCategoriesList';
$route['user/subcategory/(:num)'] = 'user_api/subCategory/$1';
$route['user/brands'] = 'user_api/allBrands';
$route['user/latest_vendors'] = 'user_api/latestVendors';
$route['user/vendors_profile/(:num)'] = 'user_api/vendorProfile/$1';
$route['user/latest_featur_products'] = 'user_api/latestFeatureProducts';
$route['user/today_deals_products'] = 'user_api/todayDealsProducts';
$route['user/bundle_products'] = 'user_api/bundleProducts';
$route['user/classified_products'] = 'user_api/ClassifiedProducts';
$route['user/latest_blogs'] = 'user_api/LatestBlogs';
$route['user/banner'] = 'user_api/bannerInformation';
$route['user/blog_category_list'] = 'user_api/BlogCategoryList';
$route['user/blog_category/(:num)'] = 'user_api/blogByCat/$1';
$route['user/blog/(:num)'] = 'user_api/blog/$1';
$route['user/stock/(:any)/(:any)/(:any)']= 'user_api/getStock/$1/$2/$3';
$route['user/productrating/(:num)'] = 'user_api/productRating/$1';
$route['user/product_view/(:num)/(:any)'] = 'user_api/productView/$1/$2';
$route['user/coupon'] = 'user_api/coupon';
$route['user/language'] = 'user_api/getLanguages';

/* Admin */
$route['admin/login'] = 'Admin_api/login';
$route['admin/view'] = 'Admin_api/view';
$route['admin/delivery_boy_status/(:num)'] = 'Admin_api/deliveryBoyStatus/$1';
$route['admin/update_delivery_boy_location'] = 'Admin_api/UpdateDeliveryBoyLocation';

















