<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('people', 'API\PersonController');
Route::apiResource('events', 'API\EventController');
Route::apiResource('attendees', 'API\AttendeeController');
Route::apiResource('roles', 'API\RoleController');
Route::apiResource('activities', 'API\ActivityController');
Route::apiResource('privileges', 'API\PrivilegeController');