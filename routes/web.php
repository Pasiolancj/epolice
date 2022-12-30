<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReportController;
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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    // Disable caching for the admin route
    header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
    header('Pragma: no-cache'); // HTTP 1.0.
    header('Expires: 0'); // Proxies.
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin', function () {
    // Disable caching for the admin route
    header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
    header('Pragma: no-cache'); // HTTP 1.0.
    header('Expires: 0'); // Proxies.

    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('admin.dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.users');
Route::get('/admin/users', [AdminController::class, 'create'])->name('admin.users');
Route::get('/admin/reports/report', [ReportController::class, 'report'])->name('admin.reports.report');
Route::post('/admin/users', [AdminController::class, 'store']);
Route::get('/edit-user/{id}', [AdminController::class, 'edit']);
Route::put('update-user', [AdminController::class, 'update']);
Route::get('admin/{id}', [AdminController::class, 'show'])->name('admin.show');
Route::delete('admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
require __DIR__ . '/auth.php';
