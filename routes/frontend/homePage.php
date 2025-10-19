<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePage\HomeController;
use Inertia\Inertia;

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/about', function () {
    return Inertia::render('Frontend/About');
})->name('about');

Route::get('/projects', function () {
    return Inertia::render('Frontend/Projects');
})->name('projects');

Route::get('/contact', function () {
    return Inertia::render('Frontend/Contact');
})->name('contact');