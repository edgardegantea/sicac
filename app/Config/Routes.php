<?php

use CodeIgniter\Router\RouteCollection;


$routes->get('/', 'UserController::login');

$routes->get('registro', 'RegistroController::new');
$routes->post('registro', 'RegistroController::create');

$routes->match(['get', 'post'], 'login', 'UserController::login', ["filter" => "noauth"]);




// Rutas para el administrador
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Admin\AdminController::index');

    $routes->get('usuarios/edit_password/(:num)', 'Admin\UsuarioController::editPassword/$1'); // Mostrar formulario para editar la contraseña
    $routes->post('usuarios/update_password/(:num)', 'Admin\UsuarioController::updatePassword/$1'); // Actualizar la contraseña del usuario

	$routes->resource('asignaturas', ['controller' => 'Admin\AsignaturaController']);
	$routes->resource('carreras', ['controller' => 'Admin\CarreraController']);
	$routes->resource('usuarios', ['controller' => 'Admin\UsuarioController']);
}
);



// Rutas para el jefe de carrera
$routes->group('jefecarrera', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'JefeCarerra\JefeCarreraController::index');
}
);




// Rutas para el estudiante
$routes->group('asesor', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Asesor\AsesorController::index');

}
);





// Rutas para el estudiante
$routes->group('estudiante', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Estudiante\EstudianteController::index');

}
);



$routes->get('logout', 'UserController::logout');