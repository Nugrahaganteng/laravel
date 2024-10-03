<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\studentcontroller;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');  
     
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/About', function () {
    return view('About');
})->name('about');
Route::get('/Contact', function () {
    return view('Contact');
})->name('contact');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::get('/student', [studentcontroller::class,'index'])->name('student.index');
    Route::resource('/student', studentcontroller::class);
});


require __DIR__.'/auth.php';
