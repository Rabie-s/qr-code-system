<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\QrCodeController;

Route::resource('qr-code',QrCodeController::class);
