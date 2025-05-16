<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('guests', 'GuestController::index');
$routes->get('guests/create', 'GuestController::create');
$routes->post('guests/store', 'GuestController::store');
$routes->get('guests/edit/(:num)', 'GuestController::edit/$1');
$routes->post('guests/update/(:num)', 'GuestController::update/$1');
