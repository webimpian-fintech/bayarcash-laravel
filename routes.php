<?php

use Illuminate\Support\Facades\Route;
use Webimpian\BayarcashLaravel\Http\Controllers\PaymentController;

// Transaction form for testing
Route::view('add', 'bayarcash-laravel::add');

Route::post('init', [PaymentController::class, 'init'])
    ->name('bayarcash-payment.init');

Route::get('requery', [PaymentController::class, 'requery'])
    ->name('bayarcash-payment.requery');
