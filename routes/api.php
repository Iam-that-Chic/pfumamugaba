<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MukandoController;
use App\Http\Controllers\MukandoUsersController;
use App\Http\Controllers\PaymentsController;

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

Route::post('/register',  [UserController::class, 'register'])->name('register');
Route::post('/login',  [UserController::class, 'login'])->name('login');



Route::middleware('auth:api')->group(function(){
  //authicate first
 
});
Route::get('user', [MukandoController::class,'authenticatedUserDetails']);
//mukando
Route::post('/create-mukando', [MukandoController::class, 'create']);
Route::post('/update-mukando', [MukandoController::class, 'update']);
Route::get('/{id}/view-mukando', [MukandoController::class, 'view']);

//my groups
Route::post('/my-mukando-groups', [MukandoUsersController::class, 'index']);

//add user to group
Route::get('{user_id}/{mukando_id}/join', [MukandoUsersController::class, 'join']);
Route::post('/join-user', [MukandoUsersController::class, 'attemptjoin']);

//initiate payment
Route::get('/initiate-payment', [PaymentsController::class, 'initiate']);
Route::get('/success', [PaymentsController::class, 'success']);