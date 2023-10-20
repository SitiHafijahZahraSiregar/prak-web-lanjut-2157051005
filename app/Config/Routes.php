<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\UserController;
use App\Controllers\KelasController;
/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

$routes->get('/profile', 'Home::profile');
$routes->get('/profile/(:any)/(:any)/(:any)', 'Home::profile/$1/$2/$3');
$routes->get('/user/profile/(:any)/(:any)/(:any)', 'UserController::profile/$1/$2/$3');
$routes->get('/user/create', 'UserController::create');
$routes->post('/user/store', 'UserController::store');
$routes->get('/user', 'UserController::index');
$routes->get('/user/detail/(:any)', 'UserController::show/$1');
$routes->get('/user/(:any)/edit', 'UserController::edit/$1');
$routes->put('/user/(:any)', 'UserController::update/$1');
$routes->get('/user/(:any)/edit', [UserController::class, 'edit']);
$routes->put('/user/(:any)', [UserController::class, 'update']);
$routes->delete('/user/(:any)', [UserController::class, 'destroy']);



$routes->get('/kelas', 'KelasController::index');
$routes->get('/kelas/create', 'KelasController::create');
$routes->post('/kelas/store', 'KelasController::store');
$routes->get('/kelas/(:any)/edit', [KelasController::class, 'edit']);
$routes->put('/kelas/(:any)', [KelasController::class, 'update']);
$routes->delete('/kelas/(:any)', [KelasController::class, 'destroy']);