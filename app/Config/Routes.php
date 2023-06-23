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
$routes->setDefaultController('C_login');
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
$routes->get('/', 'Home::index');

$routes->get('/C_admin', 'C_admin::index', ['filter' => 'auth']);
$routes->get('/C_admin/bidang', 'C_admin::bidang', ['filter' => 'auth']);
$routes->get('/C_admin/jabatan', 'C_admin::jabatan', ['filter' => 'auth']);
$routes->get('/C_admin/pegawai', 'C_admin::pegawai', ['filter' => 'auth']);
$routes->get('/C_admin/kegiatan', 'C_admin::kegiatan', ['filter' => 'auth']);
$routes->get('/C_admin/user', 'C_admin::user', ['filter' => 'auth']);

$routes->get('/C_npd', 'C_npd::index', ['filter' => 'auth']);
$routes->get('/C_npd/add_npd', 'C_npd::add_npd', ['filter' => 'auth']);
$routes->get('/C_npd/edit_npd', 'C_npd::edit_npd', ['filter' => 'auth']);
$routes->get('/C_npd/nota_npd', 'C_npd::nota_npd', ['filter' => 'auth']);

$routes->get('/C_spj', 'C_npd::index', ['filter' => 'auth']);
$routes->get('/C_spj/add_spj', 'C_spj::add_spj', ['filter' => 'auth']);
$routes->get('/C_spj/edit_spj', 'C_spj::edit_spj', ['filter' => 'auth']);

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
