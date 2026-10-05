<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('login', 'Home::login');
$routes->get('registro', 'Home::registro');

$routes->get('tareas', 'Tareas::index');
$routes->get('tareas/nueva', 'Tareas::nueva');
$routes->post('tareas/guardar', 'Tareas::guardar');