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
// $routes->get('/', 'Auth::index');
// $routes->get('tim', 'Tim::index');
// $routes->get('web/berita/detail_b/(:num)', 'Web::detail_b/$1');
// $routes->get('img_thumbs/(:segment)', 'Berita::img_thumb/$1');
// $routes->get('img_mediums/(:segment)', 'Berita::img_medium/$1');
// $routes->get('web/galery', 'Web::galery');
// $routes->get('web/video', 'Web::video');
// $routes->get('web/statistik', 'Web::statistik');
// $routes->get('web/api', 'Web::api');
// $routes->add('filemanager/(:any)', 'Filemanager::run');

$routes->group('', ['filter' => 'role:admin'], function ($routes) {
    $routes->get('tim', 'Tim::index');
    $routes->get('users', 'Auth::index');
});
$routes->group('', ['filter' => 'role:manager,admin'], function ($routes) {
    $routes->get('pemain', 'Pemain::index');
});

$routes->group('', ['filter' => 'role:pelatih,admin'], function ($routes) {
    $routes->get('aspek', 'Aspek::index');
    $routes->get('kriteria', 'Kriteria::index');
});

$routes->group('', ['namespace' => 'App\Controllers'], function ($routes) {
    // Login/out
    $routes->get('users', 'Auth::index');
    $routes->get('login', 'Auth::login', ['as' => 'login']);
    $routes->post('log-in', 'Auth::login');
    $routes->get('logout', 'Auth::logout');

    // // Registration
    // $routes->get('register', 'Auth::register', ['as' => 'register']);
    // $routes->post('register', 'Auth::attemptRegister');

    // Activation
    $routes->get('activate-account/$1/$2', 'Auth::activate/$1/$2', [
        'as' => 'activate-account',
    ]);

    // Forgot/Resets
    $routes->get('forgot-password', 'Auth::forgot_password');
    $routes->post('forgot_password', 'Auth::forgot_password');
    $routes->get('reset-password/:num', 'Auth::reset_password/$1', [
        'as' => 'reset-password',
    ]);
    $routes->get('profile', 'Auth::profile');
});
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
