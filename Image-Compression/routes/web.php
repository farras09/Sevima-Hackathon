<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageCompressionController;

Route::get('/', function () {
    return view('form');
});

Route::post('/compress',[ImageCompressionController::class, 'compress'])->name('compress');
