<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactEntryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\User\ProfileController;

Route::get('/', [BlogController::class, 'frontPage'])->name('frontpage');

// Routes for blog posts
Route::middleware(['auth'])->prefix('posts')->group(function () {
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});

// User Pages
Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
Route::get('/profile/change-password', [ProfileController::class, 'showChangePasswordForm'])->name('profile.change-password');
Route::post('/profile/change-password', [ProfileController::class, 'changePassword']);

// Routes for Blog
Route::get('/blog/{post}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/blog/category/{category}', [BlogController::class, 'category'])->name('blog.category');
Route::get('/blog/keyword/{keyword}', [BlogController::class, 'keyword'])->name('blog.keyword');

// Routes for additional pages
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/imprint', [PageController::class, 'imprint'])->name('imprint');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/contact-entries', [ContactEntryController::class, 'index'])->name('contact-entries.index');

Route::get('/contact', [ContactController::class, 'showForm'])->name('pages.contact');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('pages.contact.submit');

// Define new routes for APIs
Route::get('/api/posts', [ApiController::class, 'getPosts']);
Route::get('/api/posts/{id}', [ApiController::class, 'getPostById']);
Route::get('/api/posts/author/{author}', [ApiController::class, 'getPostsByAuthor']);
Route::get('/api/create-post', [ApiController::class, 'createPost']);









Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
