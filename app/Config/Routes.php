<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');
$routes->get('/', 'Login::index');
$routes->get('dashboard', 'Dashboard::index', ['filter' => \App\Filters\Autenticacion::class]);

//validarIngreso
$routes->post('/login/validar', 'Login::validar');
$routes->get('/login/cerrar', 'Login::cerrar');

//$routes->get('admin', ' AdminController::index', ['filter' => \App\Filters\SomeFilter::class]);
