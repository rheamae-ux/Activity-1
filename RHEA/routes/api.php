<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;

Route::get('/test', function () {
    return 'API is working';
});

Route::apiResource('teachers', TeacherController::class);
