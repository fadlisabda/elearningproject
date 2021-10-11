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
$routes->setDefaultController('LoginController');
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
$routes->get('/login', 'LoginController::index');
$routes->post('/login/save', 'LoginController::save');
$routes->get('/logout', 'LoginController::logout');
$routes->get('/home', 'LoginController::home');

$routes->match(['get', 'post'], '/guru', 'GuruController::index');
$routes->get('/guru/create', 'GuruController::create');
$routes->post('/guru/save', 'GuruController::save');
$routes->get('/guru/edit/(:num)', 'GuruController::edit/$1');
$routes->post('/guru/update/(:num)', 'GuruController::update/$1');
$routes->get('/guru/delete/(:num)', 'GuruController::delete/$1');

$routes->match(['get', 'post'], '/siswa', 'SiswaController::index');
$routes->get('/siswa/create', 'SiswaController::create');
$routes->post('/siswa/save', 'SiswaController::save');
$routes->get('/siswa/edit/(:num)', 'SiswaController::edit/$1');
$routes->post('/siswa/update/(:num)', 'SiswaController::update/$1');
$routes->get('/siswa/delete/(:num)', 'SiswaController::delete/$1');

$routes->match(['get', 'post'], '/user', 'UserController::index');
$routes->get('/user/create', 'UserController::create');
$routes->post('/user/save', 'UserController::save');
$routes->get('/user/edit/(:num)', 'UserController::edit/$1');
$routes->post('/user/update/(:num)', 'UserController::update/$1');
$routes->get('/user/delete/(:num)', 'UserController::delete/$1');

$routes->match(['get', 'post'], '/mapel', 'MapelController::index');
$routes->get('/mapel/create', 'MapelController::create');
$routes->post('/mapel/save', 'MapelController::save');
$routes->get('/mapel/edit/(:num)', 'MapelController::edit/$1');
$routes->post('/mapel/update/(:num)', 'MapelController::update/$1');
$routes->get('/mapel/delete/(:num)', 'MapelController::delete/$1');

$routes->match(['get', 'post'], '/kelas', 'KelasController::index');
$routes->get('/kelas/create', 'KelasController::create');
$routes->post('/kelas/save', 'KelasController::save');
$routes->get('/kelas/edit/(:num)', 'KelasController::edit/$1');
$routes->post('/kelas/update/(:num)', 'KelasController::update/$1');
$routes->get('/kelas/delete/(:num)', 'KelasController::delete/$1');

$routes->match(['get', 'post'], '/kelassiswa/(:num)/(:any)', 'KelasSiswaController::index/$1/$2');
$routes->get('/kelassiswa/create', 'KelasSiswaController::create');
$routes->post('/kelassiswa/save/', 'KelasSiswaController::save');
$routes->get('/kelassiswa/edit/(:num)', 'KelasSiswaController::edit/$1');
$routes->post('/kelassiswa/update/(:num)', 'KelasSiswaController::update/$1');
$routes->get('/kelassiswa/delete/(:num)', 'KelasSiswaController::delete/$1');

$routes->get('/kelasmapel', 'KelasMapelController::index');
$routes->get('/kelasmapel/siswa', 'KelasMapelController::siswa');
$routes->match(['get', 'post'], '/kelasmapel/(:num)/(:any)', 'KelasMapelController::admin/$1/$2');
$routes->get('/kelasmapel/create', 'KelasMapelController::create');
$routes->post('/kelasmapel/save', 'KelasMapelController::save');
$routes->get('/kelasmapel/edit/(:num)', 'KelasMapelController::edit/$1');
$routes->post('/kelasmapel/update/(:num)', 'KelasMapelController::update/$1');
$routes->get('/kelasmapel/delete/(:num)', 'KelasMapelController::delete/$1');

$routes->match(['get', 'post'], '/kelasjampelajaran/(:num)/(:any)', 'KelasJamPelajaranController::index/$1/$2');
$routes->get('/kelasjampelajaran/create', 'KelasJamPelajaranController::create');
$routes->post('/kelasjampelajaran/save', 'KelasJamPelajaranController::save');
$routes->get('/kelasjampelajaran/edit/(:num)', 'KelasJamPelajaranController::edit/$1');
$routes->post('/kelasjampelajaran/update/(:num)', 'KelasJamPelajaranController::update/$1');
$routes->get('/kelasjampelajaran/delete/(:num)', 'KelasJamPelajaranController::delete/$1');

$routes->match(['get', 'post'], '/eluser', 'EluserController::index');
$routes->get('/eluser/create', 'EluserController::create');
$routes->post('/eluser/save', 'EluserController::save');
$routes->get('/eluser/edit/(:num)', 'EluserController::edit/$1');
$routes->post('/eluser/update/(:num)', 'EluserController::update/$1');
$routes->get('/eluser/delete/(:num)', 'EluserController::delete/$1');

$routes->match(['get', 'post'], '/detailmapel/(:segment)/(:segment)/(:segment)', 'DetailMapelController::index/$1/$2/$3');
$routes->get('/detailmapel/create', 'DetailMapelController::create');
$routes->post('/detailmapel/save/(:any)/(:any)/(:any)', 'DetailMapelController::save/$1/$2/$3');
$routes->get('/detailmapel/edit/(:num)', 'DetailMapelController::edit/$1');
$routes->post('/detailmapel/update/(:num)/(:any)/(:any)/(:any)', 'DetailMapelController::update/$1/$2/$3/$4');
$routes->get('/detailmapel/delete/(:num)', 'DetailMapelController::delete/$1');

$routes->match(['get', 'post'], '/detailmapel/tugassiswa/(:num)', 'DetailMapelController::tugassiswa/$1');
$routes->get('/detailmapel/siswa/(:num)', 'DetailMapelController::siswa/$1');
$routes->get('/detailmapel/createsiswa', 'DetailMapelController::createsiswa');
$routes->post('/detailmapel/savesiswa/(:num)', 'DetailMapelController::savesiswa/$1');

$routes->match(['get', 'post'], '/komentar', 'KomentarController::index');
$routes->get('/komentar/create', 'KomentarController::create');
$routes->post('/komentar/save/(:num)', 'KomentarController::save/$1');
$routes->get('/komentar/delete/(:num)', 'KomentarController::delete/$1');

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
