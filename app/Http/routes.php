<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', 'HomeController@index');

Route::group(['middleware' => 'cors'], function ()
{
    Route::group(['prefix' => 'api'], function () {
        // Auth
        Route::post('auth/attempt', 'AuthController@attempt');
        Route::get('auth/logout', 'AuthController@logout');
        Route::get('auth/check', 'AuthController@check');
        // Allocation of courses to rooms or intervals
        Route::post('intervals/{id}/allocate', 'IntervalController@syncCourses');
        Route::post('rooms/{id}/allocate', 'RoomController@syncCourses');
        // Users
        Route::get('users/{offset}/{limit}', 'UserController@index');
        Route::post('users/{offset}/{limit}', 'UserController@filter');
        Route::get('users/{id}', 'UserController@show');
        Route::post('users/{id}', 'UserController@update');
        Route::delete('users/{id}', 'UserController@destroy');
        Route::post('users', 'UserController@store');
        // Courses
        Route::get('courses/{offset}/{limit}', 'CourseController@index');
        Route::post('courses/{offset}/{limit}', 'CourseController@filter');
        Route::get('courses/{id}', 'CourseController@show');
        Route::post('courses/{id}', 'CourseController@update');
        Route::delete('courses/{id}', 'CourseController@destroy');
        Route::post('courses', 'CourseController@store');
        // Semesters
        Route::get('semesters/{offset}/{limit}', 'SemesterController@index');
        Route::post('semesters/{offset}/{limit}', 'SemesterController@filter');
        Route::get('semesters/{id}', 'SemesterController@show');
        Route::post('semesters/{id}', 'SemesterController@update');
        Route::delete('semesters/{id}', 'SemesterController@destroy');
        Route::post('semesters', 'SemesterController@store');
        // Grades
        Route::get('grades/{offset}/{limit}', 'GradeController@index');
        Route::get('grades/{id}', 'GradeController@show');
        Route::post('grades/{id}', 'GradeController@update');
        Route::delete('grades/{id}', 'GradeController@destroy');
        Route::post('grades', 'GradeController@store');
        // Intervals
        Route::get('intervals/{offset}/{limit}', 'IntervalController@index');
        Route::post('intervals/{offset}/{limit}', 'IntervalController@filter');
        Route::get('intervals/{id}', 'IntervalController@show');
        Route::post('intervals/{id}', 'IntervalController@update');
        Route::delete('intervals/{id}', 'IntervalController@destroy');
        Route::post('intervals', 'IntervalController@store');
        // Rooms
        Route::get('rooms/{offset}/{limit}', 'RoomController@index');
        Route::get('rooms/{id}', 'RoomController@show');
        Route::post('rooms/{id}', 'RoomController@update');
        Route::delete('rooms/{id}', 'RoomController@destroy');
        Route::post('rooms', 'RoomController@store');
    });
});
