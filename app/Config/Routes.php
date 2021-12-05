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



$routes->get('/', 'Home::index');

$routes->group('', ['filter' => 'valid_login'], function ($routes) {
    // Views
    $routes->get('/login', 'Users::renderLogin');
    $routes->get('/register', "Users::renderRegister");
    $routes->get('/forgot-password', 'Users::renderForgotPassword');

    // controllers
    $routes->post('/login', "Users::loginAction");
    $routes->post('/register', "Users::registerAction");
});



// dashboard admin
$routes->group('', ["filter" => "authenticate"], function ($routes) {
    // Views
    $routes->get('/dashboard',  'Admin::index');

    $routes->get('/patients', 'Admin::renderPatients');
    $routes->get('/add-patients', "Admin::renderFormAddPatients");
    $routes->get('/update-patients/(:num)', "Admin::renderFormUpdatePatients/$1");

    $routes->get('/users', 'Admin::renderUsers');

    $routes->get('/medicines', 'Admin::renderMedicines');
    $routes->get('/add-medicines', "Admin::renderFormAddMedicines");
    $routes->get('/update-medicines/(:num)', "Admin::renderFormUpdateMedicines/$1");


    $routes->get('/generate-report/(:any)', "Admin::genereteReport/$1");

    // Controllers
    $routes->post('/add-patients', "Patients::addPatients");
    $routes->get('/remove-patients/(:num)', "Patients::removePatients/$1");
    $routes->post('/update-patients/(:num)', "Patients::updatePatients/$1");

    $routes->post('/add-medicines', "Medicines::addMedicines");
    $routes->get('/remove-medicines/(:num)', "Medicines::deleteMedicines/$1");
    $routes->post('/update-medicines/(:num)', "Medicines::updateMedicines/$1");

    $routes->get('/remove-users/(:num)', 'Users::deleteUsers/$1');
});


$routes->get('/user-page', "Users::renderUserPage", ["filter" => "authorization"]);
$routes->get('/logout', "Users::logout");
$routes->get('/user-page/show-profile/(:num)', "Users::showProfile/$1");
$routes->get('/user-page/update-profile/(:num)', "Users::updateProfile/$1");
$routes->post('/user-page/update-profile/(:num)', "Users::updateProfileAction/$1");





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
