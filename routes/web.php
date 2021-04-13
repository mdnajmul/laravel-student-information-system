<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('classes', App\Http\Controllers\ClassesController::class);

Route::resource('classrooms', App\Http\Controllers\ClassroomController::class);

Route::resource('batches', App\Http\Controllers\BatchController::class);

Route::resource('shifts', App\Http\Controllers\ShiftController::class);

Route::resource('courses', App\Http\Controllers\CourseController::class);

Route::resource('faculties', App\Http\Controllers\FacultyController::class);

Route::resource('times', App\Http\Controllers\TimeController::class);

Route::resource('attendances', App\Http\Controllers\AttendanceController::class);

Route::resource('academics', App\Http\Controllers\AcademicController::class);

Route::resource('days', App\Http\Controllers\DayController::class);

Route::resource('classAssignings', App\Http\Controllers\ClassAssigningController::class);

Route::resource('classSchedulings', App\Http\Controllers\ClassSchedulingController::class);

Route::resource('transactions', App\Http\Controllers\TransactionController::class);

Route::resource('admissions', App\Http\Controllers\AdmissionController::class);

Route::resource('teachers', App\Http\Controllers\TeacherController::class);

Route::resource('roles', App\Http\Controllers\RoleController::class);

Route::resource('users', App\Http\Controllers\UserController::class);

Route::resource('levels', App\Http\Controllers\LevelController::class);

Route::resource('semesters', App\Http\Controllers\SemesterController::class);


//Here we write route for dynamic selection//

//Class_Scheduling
Route::get('/dynamicLevel',['as' => 'dynamicLevel', 'uses' => 'App\Http\Controllers\ClassSchedulingController@DynamicLevel']);

//Edit route:Class_Scheduling
Route::get('/class_schedule/edit',['as' => 'edit', 'uses' => 'App\Http\Controllers\ClassSchedulingController@edit']);

//Update route:Class_Scheduling
//Route::post('/class_schedule/update',['as' => 'update', 'uses' => 'App\Http\Controllers\ClassSchedulingController@update']);
