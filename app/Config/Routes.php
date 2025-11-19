<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('spalten', 'Home::spalten');
$routes->get(from: 'create-spalten', to: 'Home::createspalten');
$routes->get('tasks', 'Home::tasks');
$routes->get('boards', 'Home::boards');