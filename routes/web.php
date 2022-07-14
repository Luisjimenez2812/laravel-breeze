<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('blog', function () {
    $posts = [
        ['id' => 1, 'title' => 'PHP',     'slug' => 'php'],
        ['id' => 2, 'title' => 'Laravel', 'slug' => 'laravel']
    ];
    return view('blog', ['posts' => $posts]);
})->name('blog');

Route::get('blog/{slug}', function ($slug) {
    $post = $slug;
    return view('post', ['post' => $post]);
})->name('post');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
