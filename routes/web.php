<?php

use App\Http\Controllers\ProfileController;
<<<<<<< HEAD
use App\Http\Controllers\ResellerController;
use App\Http\Controllers\ProductController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;
use Inertia\Inertia;
=======
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\employeeController;
use App\Http\Controllers\PusherController;
>>>>>>> 7c68d75602681d5912517472dcb1f8f0aa6275e2

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
<<<<<<< HEAD
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

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
=======
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
| 


    TO RUN PLEASE USE php artisan serv AND npm run devz
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
>>>>>>> 7c68d75602681d5912517472dcb1f8f0aa6275e2
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

<<<<<<< HEAD
Route::get('/test-caching', function () {

    $resellerController = new ResellerController();
    $productController = new ProductController();

    $startTime = microtime(true);
    $resellers = $resellerController->index();
    $products = $productController->index();

    $endTime = microtime(true);
    $executionTimeWithCaching = $endTime - $startTime;

    Cache::flush();

    $startTimeWithoutCaching = microtime(true);

    $resellersWithoutCaching = $resellerController->index();
    $productsWithoutCaching = $productController->index();

    $endTimeWithoutCaching = microtime(true);
    $executionTimeWithoutCaching = $endTimeWithoutCaching - $startTimeWithoutCaching;

    return view('test-caching', compact(
        'resellers',
        'products',
        'resellersWithoutCaching',
        'productsWithoutCaching',
        'executionTimeWithCaching',
        'executionTimeWithoutCaching'
    ));
});
=======
Route::get('/employee', [employeeController::class, 'index'])->name('employee');
Route::post('/employee', [EmployeeController::class, 'store']);

Route::get('/show', [employeeController::class, 'show']);
Route::get('/show', [EmployeeController::class, 'show'])->name('employee.show');
Route::delete('/employee/{id}', [EmployeeController::class, 'destroy'])->name('employee.delete');
Route::get('/employee/{id}/edit', [employeeController::class, 'edit'])->name('employee.edit');
Route::patch('/employee/{id}', [EmployeeController::class, 'update'])->name('employee.update');

Route::get('/chat', 'App\Http\Controllers\PusherController@index');
Route::post('/broadcast', 'App\Http\Controllers\PusherController@broadcast');
Route::post('/receive', 'App\Http\Controllers\PusherController@receive');
>>>>>>> 7c68d75602681d5912517472dcb1f8f0aa6275e2

require __DIR__.'/auth.php';
