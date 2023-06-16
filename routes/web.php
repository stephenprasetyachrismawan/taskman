<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth')->prefix('task')->name('task')->controller(TaskController::class)->group(function () {
    Route::get('/', 'show')->name('show');
    Route::get('/create', 'make')->name('make');
    Route::get('/{id}', 'detail')->where('id', '[0-9]+')->name('detail'); //edit_form
    Route::get('/{status}', 'detail_by_status')->whereIn('status', ['completed', 'incomplete'])->name('status');
    Route::post('/', 'create')->name('create');
    Route::put('/{id}', 'update')->name('update')->where('id', '[0-9]+'); //after edit form and whole update task not only status
    Route::put('/{id}/status', 'update_status')->name('update_status')->where('id', '[0-9]+'); //just update status
    Route::delete('/{id}', 'delete')->name('delete')->where('id', '[0-9]+');
});
require __DIR__ . '/auth.php';
