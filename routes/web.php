<?php

use App\Models\Artikel;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

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
Route::post('/newsletter', App\Http\Controllers\Frontend\Config\NewsletterControllers::class)->name('landing.newsletter');
Route::get('/tentang', [App\Http\Controllers\Frontend\Tentang\TentangControlles::class, 'index'])->name('landing.about');
Route::get('/acara', [App\Http\Controllers\Frontend\Acara\AcaraControllers::class, 'index'])->name('landing.acara');
Route::get('/acara/{id}', [App\Http\Controllers\Frontend\Acara\AcaraControllers::class, 'show'])->name('landing.acara.show');
Route::post('/acara/{id}', [App\Http\Controllers\Frontend\Acara\AcaraControllers::class, 'store'])->name('landing.acara.store');
Route::get('/blog', [App\Http\Controllers\Frontend\Blog\BlogControllers::class, 'index'])->name('landing.blog');
Route::get('/blog/{id}', [App\Http\Controllers\Frontend\Blog\BlogControllers::class, 'show'])->name('landing.blog.show');
Route::get('/sertifikat', [App\Http\Controllers\Frontend\Sertifikat\SertifikatController::class, 'index'])->name('landing.sertifikat');
Route::post('/sertifikat', [App\Http\Controllers\Frontend\Sertifikat\SertifikatController::class, 'cari'])->name('landing.sertifikat.cari');
Route::get('/sertifikat/{id}', [App\Http\Controllers\Frontend\Sertifikat\SertifikatController::class, 'getSertifikat'])->name('landing.sertifikat.show');

Route::view('/proyek', 'frontend.proyek.index')->name('proyek.index');
Route::view('/tentang/sejarah','frontend.tentang.sejarah')->name('tentang.sejarah');
Route::view('/tentang/periode','frontend.tentang.periode')->name('tentang.periode');
Route::view('/tentang/detail','frontend.tentang.tentang')->name('tentang.detail');
// Route::view('/tentang/visi-misi','frontend.tentang.visi-misi')->name('tentang.visi-misi');
// Route::view('/tentang/struktur-organisasi','frontend.tentang.struktur-organisasi')->name('tentang.struktur-organisasi');
Auth::routes();

// Route::get('/home',[App\Http\Controllers\HomeController::class, 'index'])->name('home');

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
    Route::get('/acara/{id}/peserta', [App\Http\Controllers\Admin\Acara\AcaraControllers::class, 'createPeserta'])->name('admin.acara.peserta');
    Route::post('/acara/{id}/peserta', [App\Http\Controllers\Admin\Acara\AcaraControllers::class, 'storePeserta'])->name('admin.acara.peserta.store');

    // Route::resource('/kategori-acara', App\Http\Controllers\Admin\Kategori\KategoriAcaraControllers::class);
    Route::resource('/divisi', App\Http\Controllers\Admin\Divisi\DivisiControllers::class);
    Route::resource('/proker', App\Http\Controllers\Admin\Proker\ProkerControllers::class);

    //edit profile
    Route::get('/profile', [App\Http\Controllers\Admin\Auth\AuthControllers::class, 'edit'])->name('admin.profile');
    Route::post('/profile', [App\Http\Controllers\Admin\Auth\AuthControllers::class, 'update'])->name('admin.profile.update');
});



// Route::view('/sertifikat/{id}', 'frontend.certificate.show')->name('sertifikat.index');
// Route::get('/sertifikat/{id}', [App\Http\Controllers\Frontend\Sertifikat\SertifikatController::class, 'getSertifikat'])->name('sertifikat.show');
Route::get('/sitemap', function () {
    $sitemap = Sitemap::create()
        ->add(Url::create('/tentang'))
        ->add(Url::create('/blog'))
        ->add(Url::create('/acara'))
        ->add(Url::create('/proyek'));

    $post = Artikel::all();
    foreach ($post as $post) {
        $sitemap->add(Url::create("/blog/{$post->slug}"));
    }
    $sitemap->writeToFile(public_path('sitemap.xml'));

    SitemapGenerator::create('https://fajrulislam.or.id/')->writeToFile('sitemap.xml');
    return 'sitemap jadi';
});
