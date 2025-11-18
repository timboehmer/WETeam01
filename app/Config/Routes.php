<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('spalten', 'Spalten::index');
$routes->get(from: 'create-spalten', to: 'CreateSpalten::index');