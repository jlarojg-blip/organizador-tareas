<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('login', 'Home::login');
$routes->post('login/validar', 'Home::autenticar');
$routes->get('registro', 'Home::registro');
$routes->post('registro/guardar', 'Home::guardarRegistro');

$routes->get('tareas', 'Tareas::index', ['filter' => 'auth']);
$routes->get('tareas/nueva', 'Tareas::nueva', ['filter' => 'auth']);
$routes->post('tareas/guardar', 'Tareas::guardar', ['filter' => 'auth']);
$routes->get('tareas/(:num)', 'Tareas::detalle/$1', ['filter' => 'auth']);
$routes->post('tareas/eliminar/(:num)', 'Tareas::eliminar/$1', ['filter' => 'auth']);
$routes->get('tareas/editar/(:num)', 'Tareas::editar/$1', ['filter' => 'auth']);
$routes->post('tareas/actualizar/(:num)', 'Tareas::actualizar/$1', ['filter' => 'auth']);
$routes->get('perfil', 'Home::perfil', ['filter' => 'auth']);
$routes->get('perfil/editar', 'Home::editarPerfil', ['filter' => 'auth']);
$routes->post('perfil/actualizar', 'Home::actualizarPerfil', ['filter' => 'auth']);
$routes->post('logout', 'Home::logout');
$routes->get('recuperar-clave', 'Home::recuperarClave');
$routes->post('recuperar-clave/enviar', 'Home::enviarInstrucciones');
$routes->get('restablecer-clave/(:segment)', 'Home::restablecerClave/$1');
$routes->post('restablecer-clave/(:segment)', 'Home::guardarNuevaContrasena/$1');
$routes->get('activar-cuenta/(:segment)', 'Home::activarCuenta/$1');
