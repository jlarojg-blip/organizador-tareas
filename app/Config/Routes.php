<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('login', 'Home::login');
$routes->get('registro', 'Home::registro');

$routes->get('tareas', 'Tareas::index');
$routes->get('tareas/nueva', 'Tareas::nueva');
$routes->post('tareas/guardar', 'Tareas::guardar');
$routes->get('tareas/(:num)', 'Tareas::detalle/$1');
$routes->post('tareas/eliminar/(:num)', 'Tareas::eliminar/$1');
$routes->get('tareas/editar/(:num)', 'Tareas::editar/$1');
$routes->post('tareas/actualizar/(:num)', 'Tareas::actualizar/$1');