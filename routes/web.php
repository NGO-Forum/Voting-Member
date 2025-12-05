<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLoginController;

// Admin Login Routes
Route::get('/admin/login', [AdminLoginController::class, 'loginForm'])
    ->name('admin.login');

Route::post('/admin/login', [AdminLoginController::class, 'login'])
    ->name('admin.login.submit');

Route::post('/admin/logout', [AdminLoginController::class, 'logout'])
    ->name('admin.logout');

Route::get('/admin/results', [AdminController::class, 'results'])->name('admin.results');

Route::get('/', [VoteController::class, 'loginForm'])->name('login.form');
Route::post('/login', [VoteController::class, 'login'])->name('login');

Route::middleware('checkMember')->group(function () {
    Route::get('/vote', [VoteController::class, 'voteForm'])->name('vote.form');
    Route::post('/submit-vote', [VoteController::class, 'submitVote'])->name('vote.submit');
    Route::get('/thank-you', [VoteController::class, 'thankYou'])->name('thankyou');
    Route::post('/logout', [VoteController::class, 'logout'])->name('logout');
});

