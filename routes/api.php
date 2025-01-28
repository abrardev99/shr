<?php

use App\Http\Controllers\DecodeController;
use App\Http\Controllers\EncodeUrlController;
use Illuminate\Support\Facades\Route;

Route::post('encode', EncodeUrlController::class);
Route::get('decode/{shortUrl}', DecodeController::class)
    ->where('shortUrl', '.*');
