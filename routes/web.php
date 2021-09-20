<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\StudentDataUploadController;

Route::get('/', [Controller::class, 'index']);
Route::get('/student/data/upload', [StudentDataUploadController::class, 'index']);
Route::post('/student/data/upload', [StudentDataUploadController::class, 'upload']);
