<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Cargando clase
use App\Http\Middleware\ApiAuthMiddleware;

// RUTAS DE PRUEBA
Route::get('/', function () {
    return '<h1>Hola mundo!!</h1>';
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/pruebas/{nombre?}', function($nombre = null){
    $texto = '<h2>Texto desde una ruta</h2>';
    $texto .= 'Nombre: ' .$nombre;
    return view('pruebas', array(
        'texto' => $texto
    ));
});

Route::get('/animales', 'PruebasController@index');
Route::get('/test-orm', 'PruebasController@testOrm');

// RUTAS DEL API

//Rutas de prueba
// Route::get('/usuario/pruebas', 'UserController@pruebas');
// Route::get('/categoria/pruebas', 'CategoryController@pruebas');
// Route::get('/entrada/pruebas', 'PostController@pruebas');

//Rutas del controlador de usuarios
Route::post('/api/register', 'UserController@register');
Route::post('/api/login', 'UserController@login');
Route::put('/api/user/update', 'UserController@update');
Route::post('/api/user/upload', 'UserController@upload')->middleware(ApiAuthMiddleware::class);
Route::get('/api/user/avatar/{filename}', 'UserController@getImage');
Route::get('/api/user/detail/{id}', 'UserController@detail');

//Rutas del controlador de categorías
Route::resource('/api/category', 'CategoryController'); // Las rutas de tipo resource generan un montón de rutas por defecto (Se pueden listar con "php artisan route:list")
