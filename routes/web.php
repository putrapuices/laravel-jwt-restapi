<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    $hello = 'Hello World';
    var_dump($hello);

    return $hello;
});

Route::get('/helloo', function () {
    $hello = ['Hello World', 2 => ['Hello Jakarta', 'Hello Medan']];
    dump($hello);

    return $hello;
});

Route::get('/hellooo', function () {
    $hello = ['Hello World', 2 => ['Hello Jakarta', 'Hello Medan']];

    echo '<pre>';
    print_r($hello);
    echo '</pre>';
    die();

    return $hello;
});
