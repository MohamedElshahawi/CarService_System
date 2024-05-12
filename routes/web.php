<?php

// use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WebsiteController;

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




Route::match(['get', 'post'], '/', [WebsiteController::class, 'index'])->name('home');







Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::prefix('/dashboard')->group(function () {
        // Profile routes
        // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        // Resource routes with the same structure as dashboard
        Route::resource('/roles', RoleController::class);
        Route::resource('/users', UserController::class);
        Route::resource('/branches', BranchController::class);
        Route::resource('/invoices', InvoiceController::class);
        Route::resource('/clients', ClientController::class);

        Route::get('/ajax/get-client-by-phone/{phone}', [InvoiceController::class, 'getClientByPhone']);

        Route::get('/', [DashboardController::class, 'getEntityCounts'])->name('dashboard');
        Route::get('/clients/all', [DashboardController::class, 'getAllClients'])->name('clients.all');

    });
});









require __DIR__.'/auth.php';
