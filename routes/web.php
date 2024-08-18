<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginAdminController;

Route::get('/', function () {
    return view('system.admin-login');
});

Route::get('/request-password', [LoginAdminController::class, 'requestPassword'])->name('password.request');
