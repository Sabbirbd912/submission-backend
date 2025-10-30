<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SubmissionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('submissions', SubmissionController::class);

// Route::get('submissions', [SubmissionController::class, 'index']);
// Route::post('/ubmissions', [SubmissionController::class, 'store']);