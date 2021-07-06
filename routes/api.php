<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController,
    TransactionController
};

Route::post('/user', [UserController::class, 'store']);
Route::post('/transaction', [TransactionController::class, 'store']);
