<?php

use App\Http\Controllers\DepartmentController;
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



Route::get('/department', [DepartmentController::class, 'index'])->name('department');

Route::get('/department/create', [DepartmentController::class, 'create'])->name('department.create');
Route::post('/department/insert', [DepartmentController::class, 'insert'])->name('department.insert');

Route::delete('/department/delete', [DepartmentController::class, 'delete'])->name('department.delete');
//Route::get('/department/delete/{department_id}', [DepartmentController::class, 'delete'])->name('department.delete');
Route::post('/department/update', [DepartmentController::class, 'update'])->name('department.update');
Route::put('/department/edit', [DepartmentController::class, 'edit'])->name('department.edit');
