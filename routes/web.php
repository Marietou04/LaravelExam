<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TariffController;
use App\Http\Controllers\VehicleController;

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
Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicles.index');
Route::get('/vehicles/create', [VehicleController::class, 'create'])->name('vehicles.create');
Route::post('/vehicles/store', [VehicleController::class, 'store'])->name('vehicles.store');
Route::get('/vehicles/{vehicle}/edit', [VehicleController::class, 'edit'])->name('vehicles.edit');
Route::put('vehicles/{vehicle}', [VehicleController::class, 'update'])->name('vehicles.update');
Route::delete('vehicles/{vehicle}', [VehicleController::class, 'destroy'])->name('vehicles.destroy');
Route::put('/vehicles/{id}/updateStatus', [VehicleController::class, 'updateStatus'])->name('vehicles.updateStatus');



Route::get('/drivers', [DriverController::class, 'index'])->name('drivers.index');
Route::get('/drivers/create', [DriverController::class, 'create'])->name('drivers.create');
Route::post('/drivers/store', [DriverController::class, 'store'])->name('drivers.store');
Route::get('/drivers/{driver}/edit', [DriverController::class, 'edit'])->name('drivers.edit');
Route::put('drivers/{driver}', [DriverController::class, 'update'])->name('drivers.update');
Route::delete('drivers/{driver}', [DriverController::class, 'destroy'])->name('drivers.destroy');



Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::post('/clients/store', [ClientController::class, 'store'])->name('clients.store');
Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
Route::put('clients/{client}', [ClientController::class, 'update'])->name('clients.update');
Route::delete('clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');


Route::get('/locations', [LocationController::class, 'index'])->name('locations.index');
Route::get('/locations/create', [LocationController::class, 'create'])->name('locations.create');
Route::post('/locations/store', [LocationController::class, 'store'])->name('locations.store');
Route::get('/locations/{location}/edit', [LocationController::class, 'edit'])->name('locations.edit');
Route::put('locations/{location}', [LocationController::class, 'update'])->name('locations.update');
Route::delete('locations/{location}', [LocationController::class, 'destroy'])->name('locations.destroy');


Route::get('/tariffs', [TariffController::class, 'index'])->name('tariffs.index');
Route::get('/tariffs/create', [TariffController::class, 'create'])->name('tariffs.create');
Route::post('/tariffs/store', [TariffController::class, 'store'])->name('tariffs.store');
Route::get('/tariffs/{tariff}/edit', [TariffController::class, 'edit'])->name('tariffs.edit');
Route::put('tariffs/{tariff}', [TariffController::class, 'update'])->name('tariffs.update');
Route::delete('tariffs/{tariff}', [TariffController::class, 'destroy'])->name('tariffs.destroy');
Route::get('tariffs/{tariff}/invoice', [TariffController::class,'generateInvoicePDF'])->name('tariffs.invoice');











require __DIR__.'/auth.php';
