<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;
use App\Http\Controllers\UserCardController;
use App\Http\Controllers\TradeRequestController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('cards', CardController::class)
    ->only(['index', 'show']);

Route::middleware(['auth', 'verified'])->group(function (){
    Route::get('/', [PostController::class, 'index'])
        ->name('dashboard');

    Route::get('/posts/create', [PostController::class, 'create'])
        ->name('posts.create');

    Route::post('/posts', [PostController::class, 'store'])
        ->name('posts.store');

    Route::resource('my-cards', UserCardController::class)
    ->except(['show']);

    Route::resource('trade-requests', TradeRequestController::class)
    ->only(['index', 'store', 'update', 'destroy']);

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
