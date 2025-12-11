<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('tasks', 'Home::tasks');
$routes->get('boards', 'Home::boards');