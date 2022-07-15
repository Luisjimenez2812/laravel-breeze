<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 * Route::get('/', [PageController::class, 'home'])->name('home');
 * Route::get('blog', [PageController::class, 'blog'])->name('blog');
 * Route::get('blog/{slug}', [PageController::class, 'post'])->name('post');
 */

Route::controller(PageController::class)->group(function () {     

    Route::get('/',                'home')->name('home');     
    Route::get('blog',             'blog')->name('blog'); 
    Route::get('blog/{post:slug}', 'post')->name('post'); 

});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('posts', PostController::class)->except(['show']);

require __DIR__.'/auth.php';
