<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('spa',['uses' => 'SpaController@index','as' => 'spa']);
Route::get('spa/get-spa-request',['uses' => 'SpaController@getSpaRequest']);


/***АДМИНКА**/
Route::group([
    'namespace' => '\App\Modules\admin\controllers',
    'as' => 'admin.',
    'prefix' => 'admin'
], function(){

    Route::group([
        'prefix' => 'users',
        'alias' => 'users'
    ], function(){
        Route::get('/', ['uses' => 'CrudController@index'])->name('users.index');
        Route::get('/change', ['uses' => 'CrudController@change']);
        Route::post('/change', ['uses' => 'UserController@change']);
        Route::get('/delete/{id}', ['uses' => 'UserController@delete']);
        Route::get('/view/{id}', ['uses' => 'UserController@view']);
    });

    Route::group([
        'prefix' => 'scope',
        'alias' => 'scope'
    ], function(){
        Route::get('/', ['uses' => 'CrudController@index'])->name('scope.index');
        Route::any('/change', ['uses' => 'CrudController@change']);
        Route::get('/delete/{id}', ['uses' => 'CrudController@delete']);
        Route::get('/view/{id}', ['uses' => 'CrudController@view']);
    });

    Route::group([
        'prefix' => 'params',
        'alias' => 'params'
    ], function(){
        Route::get('/', ['uses' => 'CrudController@index'])->name('params.index');
        Route::any('/change', ['uses' => 'CrudController@change']);
        Route::get('/delete/{id}', ['uses' => 'CrudController@delete']);
    });

    Route::group([
        'prefix' => 'character',
        'alias' => 'character'
    ], function(){
        Route::get('/', ['uses' => 'CrudController@index'])->name('character.index');
        Route::any('/change', ['uses' => 'CrudController@change']);
        Route::get('/delete/{id}', ['uses' => 'CrudController@delete']);
        Route::get('/view/{id}', ['uses' => 'CrudController@view']);
    });

    Route::group([
        'prefix' => 'course',
        'alias' => 'course'
    ], function(){
        Route::get('/', ['uses' => 'CrudController@index'])->name('course.index');
        Route::any('/change', ['uses' => 'CrudController@change']);
        Route::get('/delete/{id}', ['uses' => 'CrudController@delete']);
        Route::get('/get-task-by-scope/{id}', ['uses' => 'CourseController@getTaskByScope']);
        Route::get('/search-task/{search}', ['uses' => 'CourseController@searchTask']);
        Route::get('/get-tasks-by-course/{id}', ['uses' => 'CourseController@getTasksByCourse']);
        Route::get( '/delete-task-on-course/{taskId}', ['uses' => 'CourseController@deleteTasksOnCourse']);
        Route::get( '/generate-random-course/{courseId}', ['uses' => 'CourseController@generateRandomCourse']);
        Route::post('/add-task-in-course', ['uses' => 'CourseController@addTaskInCourse']);
        Route::get('/view/{id}', ['uses' => 'CrudController@view']);
    });

    Route::group([
        'prefix' => 'task',
        'alias' => 'task'
    ], function(){
        Route::get('/', ['uses' => 'CrudController@index'])->name('task.index');
        Route::any('/change', ['uses' => 'CrudController@change']);
        Route::get('/delete/{id}', ['uses' => 'CrudController@delete']);
        Route::get('/view/{id}', ['uses' => 'CrudController@view']);
        Route::any('/upload', ['uses' => 'TaskController@uploadTask']);
    });


    Route::get('/', ['uses' => 'HomeController@index']);
    Route::get('/login',['uses' => 'AuthController@showLoginForm'])->name('admin.login');
    Route::post('/login',['uses' => 'AuthController@login']);
    Route::get('/logout',['as' => 'admin.logout','uses' => 'AuthController@logout']);
});

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

