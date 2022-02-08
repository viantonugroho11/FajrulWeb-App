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

Route::get('/', [App\Http\Controllers\Frontend\Landing\LandingControllers::class, 'index'])->name('landing.index');
Route::post('/newsletter', [App\Http\Controllers\Frontend\Config\NewsletterControllers::class,'newssave'])->name('landing.newsletter');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//login admin
Route::get('/admin', [App\Http\Controllers\Admin\Auth\AuthControllers::class, 'getLogin'])->name('adminlogin');
Route::post('/admin', [App\Http\Controllers\Admin\Auth\AuthControllers::class, 'postLogin']);
Route::get('/admin/logout', [App\Http\Controllers\Admin\Auth\AuthControllers::class, 'postLogout'])->name('adminlogout');


Route::get('/kirimemail', [App\Http\Controllers\Admin\Mail\TestControllers::class, 'index'])->name('kirimemail');

Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\Dashboard\DashboardControllers::class, 'index'])->name('admin.dashboard');
    Route::resource('/kategori-artikel', App\Http\Controllers\Admin\Kategori\KategoriArtikelControllers::class);
    Route::resource('/artikel', App\Http\Controllers\Admin\Artikel\ArtikelControllers::class);
    Route::resource('/acara', App\Http\Controllers\Admin\Acara\AcaraControllers::class);
    // Route::resource('/kategori-acara', App\Http\Controllers\Admin\Kategori\KategoriAcaraControllers::class);
    Route::resource('/divisi', App\Http\Controllers\Admin\Divisi\DivisiControllers::class);
    Route::resource('/proker', App\Http\Controllers\Admin\Proker\ProkerControllers::class);

    //edit profile
    Route::get('/profile', [App\Http\Controllers\Admin\Auth\AuthControllers::class, 'edit'])->name('admin.profile');
    Route::post('/profile', [App\Http\Controllers\Admin\Auth\AuthControllers::class, 'update'])->name('admin.profile.update');
});
