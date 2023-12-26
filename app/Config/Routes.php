<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');
$routes->get('/', 'Login::index');
$routes->get('dashboard', 'Dashboard::index');

//validarIngreso
$routes->post('/login/validar', 'Login::validar');

