<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Models\TaskModel;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthenticatedSessionController::class, 'create'])
    ->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/task-show', [TaskController::class, 'index']);
Route::get('/add-task', function (){
    return view('add-task');
});
Route::post('add-task',[TaskController::class,'store']);

Route::get('/task-edit/{id}',[TaskController::class,'edit']);
Route::post('/task-edit/{id}',[TaskController::class,'update']);
Route::get('/task-delete/{id}',[TaskController::class,'delete']);
Route::delete('/task-delete/{id}',[TaskController::class,'destroy']);

require __DIR__ . '/auth.php';
