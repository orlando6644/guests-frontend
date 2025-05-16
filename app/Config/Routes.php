<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('guests', 'GuestController::index');
$routes->get('guests/create', 'GuestController::create');
$routes->post('guests/store', 'GuestController::store');
