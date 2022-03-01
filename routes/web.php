<?php

use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

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
    return view('index');
});

Route::get('/tulis', function (){
    return view('tulis');
})->middleware(['auth']);

Route::get('/home', [PostController::class,'index']);
Route::get('/home/{post:slug}', [PostController::class, 'show']);

Route::get('/home', function () {
    return view('home');
})->middleware(['auth'])->name('home');

require __DIR__.'/auth.php';

Route::get('/home/checkSlug',[DashboardPostController::class,'checkSlug'])->middleware('auth');
Route::resource('/home', DashboardPostController::class)->middleware('auth');

