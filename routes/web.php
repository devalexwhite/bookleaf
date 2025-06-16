<?php

use App\Http\Controllers\BookmarkController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/signup', function () {
    return view('auth.signup');
})->name('signup');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('/dashboard', fn () => view('app.dashboard'))->name('dashboard')->middleware('auth');


Route::resource('users', UserController::class)->only(['store']);
Route::post('login', [UserController::class, 'login'])->name('users.login');

Route::resource('bookmarks', BookmarkController::class)->only(['create', 'store', 'index', 'destroy'])->middleware('auth');
Route::get('bookmarks/export', [BookmarkController::class, 'export'])->name('bookmarks.export')->middleware('auth');
