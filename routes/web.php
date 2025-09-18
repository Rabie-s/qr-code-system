<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/test', function () {
    return Inertia::render('Test');
})->name('home');

Route::get('testAuth',function(){
    dd('Welcome');
})->middleware('auth');

require __DIR__.'/web/adminAuth.php';
require __DIR__.'/web/qrCodeWeb.php';
