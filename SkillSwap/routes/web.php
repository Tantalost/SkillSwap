<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;
use App\Http\Controllers\UserCardController;
use App\Http\Controllers\TradeRequestController;

Route::get('/', [CardController::class, 'index'])->name('cards.index');
Route::resource('cards', CardController::class)->only(['index', 'show']);

Route::middleware(['auth', 'verified'])->group(function (){
    Route::get('/dashboard', [PostController::class, 'index'])
        ->name('dashboard');

    Route::get('/posts/create', [PostController::class, 'create'])
        ->name('posts.create');

    Route::post('/posts', [PostController::class, 'store'])
        ->name('posts.store');

    Route::resource('my-cards', UserCardController::class)
    ->except(['show']);

    Route::resource('trade-requests', TradeRequestController::class)
    ->only(['index', 'store', 'update', 'destroy']);

    Route::resource('trade-requests', TradeRequestController::class)
    ->only(['index', 'store', 'update', 'destroy']);

    Route::get('/trade-requests', [App\Http\Controllers\TradeRequestController::class, 'index'])
        ->name('trade-requests.index');

    Route::post('/trade-requests', [App\Http\Controllers\TradeRequestController::class, 'store'])
        ->name('trade-requests.store');

    Route::put('/trade-requests/{tradeRequest}', [App\Http\Controllers\TradeRequestController::class, 'update'])
        ->name('trade-requests.update');

    Route::delete('/trade-requests/{tradeRequest}', [App\Http\Controllers\TradeRequestController::class, 'destroy'])
        ->name('trade-requests.destroy');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
