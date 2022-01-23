<?php

use App\Http\Livewire\Dashboard\Category\Categories;
use App\Http\Livewire\Dashboard\Category\Subcategories;
use App\Http\Livewire\Dashboard\User\Users;

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



Route::middleware(['auth:sanctum','verified'])->group(static function () {
    Route::get('/dashboard', static function () {
        File::cleanDirectory(storage_path('app/livewire-tmp'));
        return view('dashboard');
    })->name('dashboard');
    Route::get('/users',Users::class)->name('users');

});

require __DIR__.'/frontend.php';
require __DIR__.'/product.php';
require __DIR__ . '/blog.php';

