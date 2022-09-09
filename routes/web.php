<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Items
Route::middleware('auth')->group(function() {
    Route::get('/items', [ItemsController::class, 'index'])->name('items.index');
    Route::get('/items/create', [ItemsController::class, 'create'])->name('items.create');
    Route::post('/items/store', [ItemsController::class, 'store'])->name('items.store');
});
