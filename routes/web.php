<?php

use App\Http\Controllers\ToDoItemController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/todos', [ToDoItemController::class, 'index'])->name('todos');
    Route::post('/todos', [ToDoItemController::class, 'store'])->name('todos.store');
    Route::put('/todos/{todo}/update',[ToDoItemController::class,'update'])->name('todos.update');
    Route::delete('/todos/{todo}',[ToDoItemController::class,'destroy'])->name('todos.destroy');
});

require __DIR__.'/auth.php';
