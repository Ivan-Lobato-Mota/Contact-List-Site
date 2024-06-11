<?php

use App\Http\Controllers\Api\V1\ContactController;
use App\Http\Controllers\Api\V1\UserController;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix' => 'v1', 'namepace' => 'App\Http\Controllers\Api\V1'], function() {
    Route::apiResource('contacts', ContactController::class);
    Route::apiResource('users', UserController::class);
});