<?php

namespace Config;

// use App\Controllers\CategoryController;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

$routes->get('login', 'Auth::login');
$routes->post('login/proccess', 'Auth::proccess');
$routes->post('logout', 'Auth::logout');
// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');
$routes->addRedirect('/', 'home');

// $routes->get('categories', 'CategoryController::index');

$routes->get('category/datatables', 'Category::datatables', ['filter' => 'isLoggedIn']);
$routes->resource('category', ['filter' => 'isLoggedIn']);
$routes->get('item/datatables', 'Item::datatables', ['filter' => 'isLoggedIn']);
$routes->get('item/multipleForm', 'Item::multipleForm', ['filter' => 'isLoggedIn']);
$routes->post('item/multipleSave', 'Item::multipleSave', ['filter' => 'isLoggedIn']);
$routes->delete('item/deleteAll', 'Item::deleteAll', ['filter' => 'isLoggedIn']);
$routes->resource('item', ['filter' => 'isLoggedIn']);
// $routes->get('item', 'Item::index', ['filter' => 'isLoggedIn']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
