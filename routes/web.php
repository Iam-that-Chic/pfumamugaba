<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MukandoController;
use App\Http\Controllers\MukandoUsersController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\UserpointsController;

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

Route::get('/create-mukando', [MukandoController::class, 'create'])->name('create.mukando');
Route::post('/save-mukando', [MukandoController::class, 'save'])->name('save.mukando');
Route::post('/save-user', [MukandoUsersController::class, 'create'])->name('save.user');
Route::get('/my-mukando-groups', [MukandoUsersController::class, 'index'])->name('mukando.groups');
Route::get('/join', [MukandoUsersController::class, 'join'])->name('join.mukando');
Route::post('/join-user', [MukandoUsersController::class, 'save'])->name('join.user');
Route::get('/{id}/view-mukando', [MukandoController::class, 'view'])->name('mukando.view');
Route::get('/{id}/make-payment', [PaymentsController::class, 'create'])->name('payment.create');
Route::post('/pay', [PaymentsController::class, 'store'])->name('make.payment');
Route::post('/my-points', [UserpointsController::class, 'create'])->name('create.points');
Route::put('/edit-points', [UserpointsController::class, 'edit'])->name('edit.points');
Route::get('/loyalty-points', [UserpointsController::class, 'show'])->name('loyalty.points');