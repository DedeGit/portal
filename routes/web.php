<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SearchController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/post/{post_url}', [PostsController::class, 'show'])->name('post.show');
Route::get('/berita', [PostsController::class, 'allNews'])->name('berita.semua');
Route::get('/berita-populer', [PostsController::class, 'popularNews'])->name('berita.populer');
Route::get('/hot-news', [PostsController::class, 'hotNews'])->name('berita.hot');

Route::get('/admin/auth/login', function () {
  return view("admin.authentication.login");
})->name('login');
Route::post('/admin/auth/login', [UserController::class, 'login'])->name('login');
Route::post('/admin/auth/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard']) ->middleware('auth');

Route::get('/admin/posts', [AdminController::class, 'allPosts']) ->middleware('auth');

Route::get('/admin/post-new', [AdminController::class, 'addPosts']) ->middleware('auth');
Route::post('admin/post-new', [PostsController::class, 'store'])->middleware('auth');

Route::get('/admin/edit-post/{id}', [AdminController::class, 'editPost']);
Route::put('/admin/update-post/{id}', [PostsController::class, 'update']);
Route::get('/admin/delete-post/{id}', [PostsController::class, 'destroy']);


Route::get('/admin/general', [AdminController::class, 'dashboard']) ->middleware('auth');
Route::get('/admin/users', [AdminController::class, 'users']) ->middleware('auth');

Route::resource('post', PostsController::class);
Route::resource('/admin/ads', AdsController::class)->middleware('auth');
Route::get('/admin/ads', [AdminController::class, 'ads'])->middleware('auth')->name('Ads');
Route::get('/admin/ads/create', [AdminController::class, 'addAds'])->middleware('auth') ->name('addAds');
Route::get('/admin/ads/edit/{id}', [AdminController::class, 'editAds'])->middleware('auth')->name('editAds');
Route::delete('/admin/ads/destroy/{id}', [AdsController::class, 'destroy'])->middleware('auth');
Route::put('/admin/update-ads/{id}', [PostsController::class, 'update']);

Route::get('/admin/edit-ads/{id}', [AdminController::class, 'editAds']);
Route::put('/admin/update-ads/{id}', [AdsController::class, 'update']);
Route::delete('/admin/delete-ads/{id}', [AdsController::class, 'destroy']);

Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
Route::get('/admin/users/{id}', [UserController::class, 'edit']);
Route::put('/admin/users/{id}', [UserController::class, 'update']);
Route::delete('/admin/users/{id}', [UserController::class, 'destroy']);

Route::get('/search', [SearchController::class, 'index'])->name('search');

Route::get('/tentang_kami', [PageController::class, 'tentangKami']);
Route::get('/redaksi', [PageController::class, 'redaksi']);
Route::get('/info_iklan', [PageController::class, 'infoIklan']);
Route::get('/pedoman_media_siber', [PageController::class, 'pedomanMediaSiber']);
Route::get('/disclaimer', [PageController::class, 'disclaimer']);
Route::get('/kontak_kami', [PageController::class, 'kontakKami']);

// ================= KATEGORI =================

// main category (Hukum, Politik, dll)
Route::get('/kategori/{main}', [PostsController::class, 'byMainCategory'])
    ->name('kategori.main');

// sub category (Seputar Riau -> Kabupaten)
Route::get('/kategori/{main}/{sub}', [PostsController::class, 'bySubCategory'])
    ->name('kategori.sub');

// more
Route::get('/more/{more}', [PostsController::class, 'byMore'])
    ->name('kategori.more');

// ================= STATUS BERITA =================
Route::get('/status/{status}', [PostsController::class, 'byStatus'])
    ->name('post.status');

Route::get('/filter-result', [HomeController::class, 'filter'])->name('filter.result');


