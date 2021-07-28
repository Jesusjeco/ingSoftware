<?php

use App\Http\Controllers;
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

Route::resource('people', 'PersonController');
Route::resource('events', 'EventController');
Route::resource('attendees', 'AttendeeController');
Route::resource('roles', 'RoleController');
Route::resource('activities', 'ActivityController');
Route::resource('privileges', 'PrivilegeController');

Route::get('/', function () {
    return redirect(action('EventController@index'));
});

Route::get('create_attendee', 'AttendeeController@create_attendee');
Route::post('store_attendee', 'AttendeeController@store_attendee');