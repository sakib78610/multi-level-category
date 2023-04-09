<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssessmentController;

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

Auth::routes();
Route::get('/', function () { return view('login.index');});
Route::get('/login', function () { return view('login.index'); })->name('login');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin'], function ()  {
Route::group(['middleware' => ['web']], function() {
Route::group(['middleware' => 'auth'], function ()   {

Route::get('/dashboard', [AssessmentController::class, 'dashboard'])->name('dashboard');
Route::get('/users/list', [AssessmentController::class, 'usersList'])->name('usersList');

Route::get('/category/list', [AssessmentController::class, 'categoriesList'])->name('categories.index');
Route::post('/add/category', [AssessmentController::class, 'createCategory'])->name('category.store');
Route::put('/category/{id}', [AssessmentController::class, 'updateCategory'])->name('category.update');
Route::put('/sub-category/{id}', [AssessmentController::class, 'addSubCategory'])->name('subCategory.store');
Route::delete('/category/{id}', [AssessmentController::class, 'deleteCategory'])->name('category.destroy');
Route::any('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');




    });
  });
});