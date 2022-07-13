<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Src\App\RegisterUserAction;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/v1/ping', function () {
    return ['PONG'];
});

Route::post('/v1/user-access/register', function(Request $request) {
    $registerUserAction = new RegisterUserAction();

    return $registerUserAction()->toArray();
});
