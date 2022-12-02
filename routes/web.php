<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    Artisan::call('migrate');
    return view('welcome');
});

Route::get('post', function () {

    $posts = \App\Models\Post::query()->get();
    Artisan::call('migrate');
    return response()->json($posts);
});

require __DIR__.'/auth.php';
