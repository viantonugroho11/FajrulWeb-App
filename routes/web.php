<?php

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

// Route::get('/', function () {
//     return view('users.landing.index');
// });

Route::get('/',[App\Http\Controllers\Frontend\Landing\LandingControllers::class,'index'])->name('landing.index');
Route::post('/newsletter',[App\Http\Controllers\Frontend\Config\NewsletterControllers::class])->name('landing.newsletter');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard',[App\Http\Controllers\Admin\Dashboard\DashboardControllers::class,'index'])->name('admin.dashboard');
Route::resource('/kategori-artikel', App\Http\Controllers\Admin\Kategori\KategoriArtikelControllers::class);
Route::resource('/artikel', App\Http\Controllers\Admin\Artikel\ArtikelControllers::class);
Route::resource('/acara', App\Http\Controllers\Admin\Acara\AcaraControllers::class);
// Route::resource('/kategori-acara', App\Http\Controllers\Admin\Kategori\KategoriAcaraControllers::class);
Route::resource('/divisi', App\Http\Controllers\Admin\Divisi\DivisiControllers::class);
Route::resource('/proker', App\Http\Controllers\Admin\Proker\ProkerControllers::class);
