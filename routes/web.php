<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BorrowController;


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
    return view('home');
});
Route::get('/login',[AuthController::class, 'login'])->name('login');
Route::post('/POSTlogin',[AuthController::class, 'postLogin']);
Route::get('/register',[AuthController::class, 'register'])->name('register');
Route::post('/POSTregister',[MemberController::class, 'postRegister']);

Route::get('/our-collections',[BookController::class, 'viewOnly']);

Route::group(['middleware' => ['auth','checkRole:admin,member,staff']], function(){
  Route::get('/logout',[AuthController::class, 'logout']);
});

Route::group(['middleware' => ['auth','checkRole:staff,admin']], function(){
  //
});

Route::group(['middleware' => ['auth','checkRole:staff']], function(){
  Route::get('/staff-profile/{id}',[ProfileController::class, 'staffIndex']);
  Route::get('/book',[BookController::class, 'index']);
  Route::post('/book/create',[BookController::class, 'create']);
  Route::get('/book/{id}/edit',[BookController::class, 'edit']);
  Route::post('/book/{id}/update',[BookController::class, 'update']);
  Route::get('/book/{id}/delete',[BookController::class, 'delete']);
  Route::get('/member',[MemberController::class, 'index']);
  Route::post('/member/create',[MemberController::class, 'create']);
  Route::get('/member/{id}/delete',[MemberController::class, 'delete']);
  Route::get('/borrow/waiting',[BorrowController::class, 'waitingAcc']);
  Route::post('/borrow/{id}/acc',[BorrowController::class, 'accBorrow']);
  Route::get('/borrow',[BorrowController::class, 'index']);

});

Route::group(['middleware' => ['auth','checkRole:admin']], function(){
  Route::get('/staff',[StaffController::class, 'index']);
  Route::post('/staff/create',[StaffController::class, 'create']);
  Route::get('/staff/{id}/edit',[StaffController::class, 'edit']);
  Route::post('/staff/{id}/update',[StaffController::class, 'update']);
  Route::get('/staff/{id}/delete',[StaffController::class, 'delete']);
  Route::get('/admin-profile/{id}',[ProfileController::class, 'adminIndex']);

});

Route::group(['middleware' => ['auth','checkRole:member,staff']], function(){
  Route::get('/member/{id}/edit',[MemberController::class, 'edit']);
  Route::post('/member/{id}/update',[MemberController::class, 'update']);
});

Route::group(['middleware' => ['auth','checkRole:member']], function(){
  Route::get('/member-profile/{id}',[ProfileController::class, 'memberIndex']);
  Route::get('/books',[BookController::class, 'viewList']);
  Route::post('/borrow/request/{id}',[BorrowController::class, 'createRequest']);
  Route::get('/borrow/{id}/delete',[BorrowController::class, 'deleteRequest']);
  Route::get('/borrow/request',[BorrowController::class, 'indexMyReq']);
});
