<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/', function () {
    $courseController = new CourseController();

    $usersCount = $courseController->getUsersCount();
    $postsCount = $courseController->getPostsCount();
    $coursesCount = $courseController->getCoursesCount();

    return view('acceuil', compact('usersCount', 'postsCount', 'coursesCount'));
});

Auth::routes();

Route::get('/register/step1',[RegisterController::class,'showStep1Form'])->name('register.step1');
Route::post('/register/step1', [RegisterController::class,'processStep1']);

Route::get('/register/step2', [RegisterController::class,'showStep2Form'] )->name('register.step2');
Route::post('/register/step2', [RegisterController::class,'register'] );

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/acc', function(){
    return view('acceuil');
});

Route::get('/courses', [CourseController::class, 'index'])->name('display');
Route::get('/courses/filter', [CourseController::class, 'filter'])->name('courses.filter');
Route::get('/courses/create', [CourseController::class, 'create'])->name('create');
Route::post('/courses/store', [CourseController::class, 'store'])->name('store');
Route::get('/courses/{id}', [CourseController::class, 'show'])->name('show');
Route::post('/courses/rate/{id}', [CourseController::class, 'rate'])->name('rate');
Route::post('/courses/{id}/download', [CourseController::class, 'download'])->name('download');

Route::get('/domaines_etudes', [CourseController::class, 'getFieldsOfStudy']);





Route::get('/test', function () {
    return 'This is a test route.';
});