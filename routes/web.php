<?php

use App\Http\Controllers\LinkController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitController;

require __DIR__.'/auth.php';

Route::get('/', function () {
    return redirect()->route('links.index');
});

// authenticated user only
Route::middleware('auth')->group(function () {
    // links
    Route::get('/links', [LinkController::class, 'index'])->name('links.index');
    Route::get('/link/add', [LinkController::class, 'create'])->name('links.create');
    Route::post('/link/add', [LinkController::class, 'store'])->name('links.store');
    Route::get('/link/{link}/edit', [LinkController::class, 'edit'])->name('links.edit');
    Route::patch('/link/{link}', [LinkController::class, 'update'])->name('links.update');
    Route::delete('/link/{link}', [LinkController::class, 'destory'])->name('links.destory');

    // edit and update user's
    Route::get('/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::patch('/{user}/update', [UserController::class, 'update'])->name('users.update');
});

Route::post('/visit/{link}', [VisitController::class, 'store']); // count visits
Route::get('/{user:username}', [UserController::class, 'index'])->name('profile.index'); // link profile
