<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Admin::index');
$routes->get('/admin/dashboard', 'Admin::index');
$routes->get('/admin/inputData', 'Admin::inputData', ['filter' => 'role:superadmin,admin,marketing']);
$routes->get('/admin/inquiryProses', 'Admin::inquiryProses', ['filter' => 'role:superadmin,admin']);
$routes->get('/admin/(:num)', 'Admin::detail/$1', ['filter' => 'role:superadmin']);
$routes->get('/cekLog', 'Admin::cekLog');
// $routes->get('user/inputData', 'Admin::UserInputData', ['filter' => 'role:admin,superadmin']);
// $routes->get('/admin/userlist', 'Admin::userList', ['filter' => 'role:admin,superadmin']);
// $routes->get('/admin', 'Admin::index', ['filter' => 'role:admin,superadmin']);
// $routes->get('/admin/index', 'Admin::index', ['filter' => 'role:admin']);

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
