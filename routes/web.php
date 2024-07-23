<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BlogController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/service', fn () => view('service'))->name('service');
Route::get('/portfolio', fn () => view('portfolio'))->name('portfolio');
Route::get('/blog/{id}', [BlogController::class, 'index'])->name('blog');
Route::resource('/review', ReviewController::class);

Route::controller(ArticleController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('articles.index');
    Route::get('/input', 'create')->name('articles.input');
    Route::get('/edit/{id}', 'edit')->name('articles.edit');
    Route::get('/article', 'article')->name('articles.article');
    Route::get('/article/{id}', 'articleDetail')->name('articles.detail');
    Route::post('/dashboard', 'store')->name('articles.store');
    Route::post('/edit/{id}', 'update')->name('articles.update');
    Route::delete('/dashboard/{id}', 'destroy')->name('articles.destroy');
});

Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'show')->name('contact.show');
    Route::post('/contact', 'send')->name('contact.send');
});

Route::middleware('auth')->group(function () {
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });
});

require __DIR__ . '/auth.php';
