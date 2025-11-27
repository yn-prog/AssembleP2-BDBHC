<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HealthRecordController;
use App\Http\Controllers\MapDataController;
use App\Http\Controllers\ReportController;
use App\Http\Middleware\IsAdmin;

// 🔓 PUBLIC ROUTES
Route::get('/', fn() => view('login'));
Route::get('/login', fn() => view('login'))->name('login');

Route::get('/auth/google', [GoogleController::class, 'redirect'])->name('auth.google.redirect');
Route::get('/auth/google/callback', [GoogleController::class, 'callback'])->name('auth.google.callback');

// 📊 PUBLIC MAP DATA ROUTES
Route::get('/geo-data', [MapDataController::class, 'getGeoData']);
Route::get('/debug-streets', [MapDataController::class, 'debugStreets']);
Route::get('/street-details/{street}', [MapDataController::class, 'getStreetDetails']);

// 🧪 DEBUG ROUTES
Route::get('/debug-record', fn() => App\Models\HealthRecord::latest()->first());
Route::get('/debug-columns', fn() => Schema::getColumnListing('health_records'));
Route::get('/test-speed', fn() => 'Quick response!');
Route::get('/test-admin', fn() => '✅ Admin route works!')->middleware(['auth', 'is_admin']);

// 🔐 AUTH-PROTECTED ROUTES
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Health Records
    Route::get('/health-records', [HealthRecordController::class, 'index'])->name('health.records');
    Route::get('/health-records/create', [HealthRecordController::class, 'create'])->name('health.records.create');
    Route::post('/health-records', [HealthRecordController::class, 'store'])->name('health.records.store');
    Route::get('/health-records/{id}', [HealthRecordController::class, 'show'])->name('health.records.show');
    Route::put('/health-records/{id}', [HealthRecordController::class, 'update'])->name('health.records.update');
    Route::delete('/health-records/{id}', [HealthRecordController::class, 'destroy'])->name('health-records.destroy');
    Route::post('/health-records/{id}/update-date', [HealthRecordController::class, 'updateDate'])->name('health.records.update.date');

    Route::get('/health-records/count-today', [HealthRecordController::class, 'countToday']);
    Route::get('/health-records/count-total', [HealthRecordController::class, 'countTotal']);

    // Prediction & Reports
    Route::get('/prediction-model', fn() => view('prediction_model'))->name('prediction.model');
    Route::get('/reports', [ReportController::class, 'report'])->name('reports');

    // Logout
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/login');
    })->name('logout');
});

// 🛡️ ADMIN ROUTES
Route::middleware([IsAdmin::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/history', [AdminController::class, 'history'])->name('history');
    Route::get('/staff', [AdminController::class, 'staff'])->name('staff');
    Route::get('/staff/{id}/edit', [AdminController::class, 'staffEdit'])->name('staff.edit');
    Route::put('/staff/{id}', [AdminController::class, 'staffUpdate'])->name('staff.update');
    Route::delete('/staff/{id}', [AdminController::class, 'staffDestroy'])->name('staff.destroy');

    // Admin profile
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::put('/profile', [AdminController::class, 'profileUpdate'])->name('profile.update');
    Route::put('/profile/address', [AdminController::class, 'profileUpdateAddress'])->name('profile.update.address');
    Route::post('/profile/avatar', [AdminController::class, 'profileUpdateAvatar'])->name('profile.update.avatar');
});


Route::get('/test-route-confirmation', fn() => '✅ Laravel route works!');
