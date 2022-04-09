<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentCourseController;
use App\Http\Controllers\VideoController;


Route::group([

    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'auth'

], function ($router) {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::group(['middleware' => ['jwt.auth']], function() {
    Route::get('courses', [CourseController::class, 'index']);
    Route::get('courses/{id}', [CourseController::class, 'show']);
    Route::post('courses', [CourseController::class, 'store']);
    Route::put('courses/{id}', [CourseController::class, 'update']);
    Route::delete('courses/{id}', [CourseController::class, 'destroy']);
});

Route::group(['middleware' => ['jwt.auth']], function() {
    Route::get('students', [StudentController::class, 'index']);
    Route::get('students/{id}', [StudentController::class, 'show']);
    Route::post('students', [StudentController::class, 'store']);
    Route::put('students/{id}', [StudentController::class, 'update']);
    Route::delete('students/{id}', [StudentController::class, 'destroy']);
});

Route::group(['middleware' => ['jwt.auth']], function() {
    Route::get('student_courses', [StudentCourseController::class, 'index']);
    Route::get('student_courses/{id}', [StudentCourseController::class, 'show']);
    Route::post('student_courses', [StudentCourseController::class, 'store']);
    Route::put('student_courses/{id}', [StudentCourseController::class, 'update']);
    Route::delete('student_courses/{id}', [StudentCourseController::class, 'destroy']);
});

Route::group(['middleware' => ['jwt.auth']], function() {
    Route::get('videos', [VideoController::class, 'index']);
    Route::get('videos/{id}', [VideoController::class, 'show']);
    Route::post('videos', [VideoController::class, 'store']);
    Route::put('videos/{id}', [VideoController::class, 'update']);
    Route::delete('videos/{id}', [VideoController::class, 'destroy']);
});

