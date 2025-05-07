<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('ordermanagement', function () {
    return Inertia::render('OrderManagement');
})->middleware(['auth', 'verified'])->name('ordermanagement');
Route::get('itemmanagement', function () {
    return Inertia::render('ItemManagement');
})->middleware(['auth', 'verified'])->name('itemmanagement');
Route::get('usermanagement', function () {
    return Inertia::render('UserManagement');
})->middleware(['auth', 'verified'])->name('usermanagement');
Route::get('inventory', function () {
    return Inertia::render('Inventory');
})->middleware(['auth', 'verified'])->name('inventory');
Route::get('analytics', function () {
    return Inertia::render('Analytics');
})->middleware(['auth', 'verified'])->name('analytics');
Route::get('pointofsale', function () {
    return Inertia::render('PointOfSale');
})->middleware(['auth', 'verified'])->name('pointofsale');



require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
