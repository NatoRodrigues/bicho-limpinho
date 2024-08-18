<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginAdminController;

Route::get('/', function () {
    return view('system.admin-login');
});

Route::post('/request-password', [LoginAdminController::class, 'requestPassword'])->name('password.request');


Route::get('/form-request-pass', function() {
    return view('system.admin-request-password');
})->name('admin.request.password');