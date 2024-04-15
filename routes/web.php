<?php
//
use Illuminate\Support\Facades\Route;
//
//Route::get('/', function () {
//    return view('dashboard');
//});

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\UserController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::post('/idea', [\App\Http\Controllers\ideaController::class, 'store'])->name('idea.create');

Route::get('/idea/{idea}/edit', [\App\Http\Controllers\ideaController::class, 'edit'])->name('idea.edit')->middleware('auth');

Route::put('/idea/{idea}', [\App\Http\Controllers\ideaController::class, 'update'])->name('idea.update')->middleware('auth');

Route::get('/idea/{idea}', [\App\Http\Controllers\ideaController::class, 'show'])->name('idea.show');

Route::delete('/idea/{idea}', [\App\Http\Controllers\ideaController::class, 'destroy'])->name('idea.destroy')->middleware('auth');

Route::post('/idea/{idea}/comments', [\App\Http\Controllers\CommentController::class, 'store'])->name('idea.comments.store')->middleware('auth');

Route::get('/register', [\App\Http\Controllers\AuthController::class, 'register'])->name('register');

Route::post('/register', [\App\Http\Controllers\AuthController::class, 'store']);

Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');

Route::post('/login', [\App\Http\Controllers\AuthController::class, 'authenticate']);

Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::resource('users', \App\Http\Controllers\UserController::class)->only('show', 'edit', 'update')->middleware('auth');

Route::get('profile', [\App\Http\Controllers\UserController::class, 'profile'])->middleware('auth')->name('profile');

Route::post('users/{user}/follow', [\App\Http\Controllers\FollowerController::class, 'follow'])->middleware('auth')->name('users.follow');

Route::post('users/{user}/unfollow', [\App\Http\Controllers\FollowerController::class, 'unfollow'])->middleware('auth')->name('users.unfollow');


Route::post('idea/{idea}/like', [\App\Http\Controllers\IdeaLikeController::class, 'like'])->middleware('auth')->name('idea.like');

Route::post('idea/{idea}/unlike', [\App\Http\Controllers\IdeaLikeController::class, 'unlike'])->middleware('auth')->name('idea.unlike');

Route::get('/feed', [\App\Http\Controllers\FeedController::class, '__invoke'])->middleware('auth')->name('feed');

Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard');


//Route::get('/users', [\App\Http\Controllers\UserController::class, 'show'])->name('show');
//Route::resource('idea', \App\Http\Controllers\ideaController::class)->except(['index', 'create', 'show'])->middleware('auth');
//Route::resource('idea', \App\Http\Controllers\ideaController::class)->only(['show']);


Route::get('/terms', function() {
    return view('terms');
})->name('terms');
