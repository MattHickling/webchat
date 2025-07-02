<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Broadcast;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Broadcast::routes();

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/add-contact', [ContactController::class, 'addContact']);
    Route::post('/create-contact', [ContactController::class, 'create'])->name('contact.create');

    Route::get('/new-chat', [MessageController::class, 'newChat']);
    Route::get('/messages', [MessageController::class, 'show'])->name('messages.show');
    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');


});

require __DIR__.'/auth.php';
