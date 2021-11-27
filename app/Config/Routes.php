<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Views
$routes->get('/', 'Home::index');
$routes->get('/login', 'Users::renderLogin');
$routes->get('/register', "Users::renderRegister");
$routes->get('/forgot-password', 'Users::renderForgotPassword');


// dashboard admin
$routes->get('/dashboard',  'Admin::index');
$routes->get('/patients', 'Admin::renderPatients');
$routes->get('/users', 'Admin::renderUsers');
$routes->get('/medicines', 'Admin::renderMedicines');
$routes->get('/add-patients', "Admin::renderFormAddPatients");
$routes->get('/add-medicines', "Admin::renderFormAddMedicines");


// Controllers
$routes->post('/login', "Users::loginAction");


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
