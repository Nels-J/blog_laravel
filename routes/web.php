<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
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

Route::get('/', HomeController::class)->name('home');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('post.show');
Route::post('/posts/{post}', [CommentController::class, 'store'])->name('comment.store');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/postcreate', [DashboardController::class, 'create'])->name('postcreate');
    Route::post('/dashboard/postcreate', [DashboardController::class, 'store'])->name('poststore');
});

require __DIR__ . '/auth.php';
