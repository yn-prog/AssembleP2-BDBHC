<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\HealthRecordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MapDataController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Schema;
use App\Http\Middleware\BlockUserRole;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\CaseAreaSettingController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\PatientReportController;
use App\Http\Controllers\PredictionController;
use App\Http\Middleware\CheckRole;
// ------------------------
// 🏠 Public Routes
// ------------------------

Route::get('/', function () {
    return view('login');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/unauthorized', function () {
    return view('unauthorized');
})->name('unauthorized');

// Google OAuth
Route::get('/auth/google', [GoogleController::class, 'redirect'])->name('auth.google.redirect');
Route::get('/auth/google/callback', [GoogleController::class, 'callback'])->name('auth.google.callback');

// ------------------------
// 🔐 Authenticated + Block User
// ------------------------

Route::middleware(['auth', BlockUserRole::class])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //Admin Dashboard


    // Health Records
    Route::get('/health-records/count-today', [HealthRecordController::class, 'countToday']);
    Route::get('/health-records/count-total', [HealthRecordController::class, 'countTotal']);
    Route::get('/health-records', [HealthRecordController::class, 'index'])->name('health.records');
    Route::get('/health-records/create', [HealthRecordController::class, 'create'])->name('health.records.create');
    Route::post('/health-records', [HealthRecordController::class, 'store'])->name('health.records.store');
    Route::get('/health-records/{id}', [HealthRecordController::class, 'show'])->name('health.records.show');
    Route::put('/health-records/{id}', [HealthRecordController::class, 'update'])->name('health.records.update');
    Route::delete('/health-records/{id}', [HealthRecordController::class, 'destroy'])->name('health-records.destroy');
    Route::post('/health-records/{id}/archive', [HealthRecordController::class, 'archive'])->name('health-records.archive');
    Route::post('/health-records/{id}/restore', [HealthRecordController::class, 'restore'])->name('health-records.restore');
    Route::put('/health-records/{id}/archive', [HealthRecordController::class, 'archive'])->name('health-records.archive');
    Route::post('/health-records/{id}/update-date', [HealthRecordController::class, 'updateDate'])->name('health.records.update.date');
    Route::get('/health-records/history/{id}', [HealthRecordController::class, 'showHistory'])->name('health.records.history');

//PrintedReports
    Route::get('/patients/{id}/print-report', [PatientReportController::class, 'printPatientReport'])
    ->name('patients.printReport');

    Route::get('/patients/print-all', [PatientReportController::class, 'printAllPatients'])->name('patients.printAll');
    Route::post('/reports/print', [PatientReportController::class, 'printReports'])->name('reports.print');



    // Reports
    Route::get('/reports', [ReportController::class, 'report'])->name('reports');
    Route::get('/reports/gender-breakdown', [ReportController::class, 'getGenderBreakdown']);

    // Prediction Model
    Route::get('/prediction-model', function () {
        return view('prediction_model');
    })->name('prediction.model');

    // Logout
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/login');
    })->name('logout');

    // Test & Debug
    Route::get('/debug-record', function () {
        return App\Models\HealthRecord::latest()->first();
    });
    Route::get('/debug-columns', function () {
        return Schema::getColumnListing('health_records');
    });
    Route::get('/test-speed', function () {
        return 'Quick response!';
    });

    // Physician Archive (additional restriction)
    Route::middleware(['role:physician'])->group(function () {
        Route::post('/health-records/archive', [HealthRecordController::class, 'archive']);
    });
});

// ------------------------
// 🛡️ Admin-only Routes
// ------------------------

Route::middleware(['auth', IsAdmin::class])->group(function (){
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::get('/history', [AdminController::class, 'history'])->name('history');
        Route::get('/staff', [StaffController::class, 'index'])->name('staff');
        Route::get('/staff/{id}/edit', [AdminController::class, 'staffEdit'])->name('staff.edit');
        Route::put('/staff/{id}', [AdminController::class, 'staffUpdate'])->name('staff.update');
        Route::delete('/staff/{id}', [AdminController::class, 'staffDestroy'])->name('staff.destroy');
        Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
        Route::put('/profile', [AdminController::class, 'profileUpdate'])->name('profile.update');
        Route::get('/records/{id}/view', [HealthRecordController::class, 'view'])->name('records.view');
        Route::put('/profile/address', [AdminController::class, 'profileUpdateAddress'])->name('profile.update.address');
        Route::post('/profile/avatar', [AdminController::class, 'profileUpdateAvatar'])->name('profile.update.avatar');
         Route::get('/case-areas', [CaseAreaSettingController::class, 'all']);
             Route::post('/case-areas/update/{type}', [CaseAreaSettingController::class, 'update'])->name('case-areas.update');
             
    });

    // Extra admin test route
    Route::get('/test-admin', function () {
        return '✅ Admin route works!';
    })->name('admin.test');

    // Admin update staff role
    Route::put('/staff/{id}/role', [StaffController::class, 'updateRole'])->name('staff.updateRole');
    Route::put('/admin/staff/{id}/role', [StaffController::class, 'updateRole'])->name('admin.staff.updateRole');
    
    

    Route::get('/admin/history', [AdminController::class, 'systemHistory'])->name('admin.history');
});

// ------------------------
// 🌍 Public Map Data
// ------------------------

Route::get('/geo-data', [MapDataController::class, 'getGeoData']);
Route::get('/debug-streets', [MapDataController::class, 'debugStreets']);
Route::get('/street-details/{street}', [MapDataController::class, 'getStreetDetails']);

Route::post('/health-records/restore/{id}', [HealthRecordController::class, 'restore'])
    ->name('health-records.restore')
    ->middleware('auth');


    Route::get('/admin/records-edited-count', function () {
    return response()->json([
        'count' => \App\Models\ActionLog::where('action_type', 'Edited Record')->count()
    ]);
});

Route::get('/admin/latest-records', function () {
    $logs = \App\Models\ActionLog::with(['user', 'patient'])
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get()
        ->map(function ($log) {
            return [
                'id' => $log->patient_id,
                'name' => $log->patient->first_name . ' ' . $log->patient->last_name,
                'action' => $log->action_type,
                'editor' => $log->user->name ?? '—',
                'timestamp' => $log->created_at->format('M d, Y h:i A'),
                'details' => $log->details
            ];
        });

    return response()->json($logs);
});


Route::post('/admin/diagnosis/store', [DiagnosisController::class, 'store'])->name('admin.diagnosis.store');
Route::get('/diagnoses', [DiagnosisController::class, 'index'])->name('diagnoses.index');
Route::put('/admin/diagnosis/update/{id}', [DiagnosisController::class, 'update'])->name('admin.diagnosis.update');


// Prediction Routes
Route::get('/prediction', [PredictionController::class, 'index']);
Route::post('/prediction', [PredictionController::class, 'predict'])->name('prediction.predict');Route::get('/predictions', [YourController::class, 'showPredictions'])->name('predictions');
Route::get('/predictions', [PredictionController::class, 'showPredictions'])->name('predictions.show');


// ------------------------ Live Searcgh Diagnosis
Route::get('/admin/diagnosis/search', [StaffController::class, 'ajaxDiagnosisSearch'])->name('admin.diagnosis.ajaxSearch');


 Route::get('/admin/live-search', [AdminController::class, 'liveSearch'])->name('admin.live-search');
    Route::get('/admin/history', [AdminController::class, 'systemHistory'])->name('admin.history');
    
    
    
    //ReportFilterCasesPerStreet
    Route::get('/reports/cases-per-street', [ReportController::class, 'casesPerStreetData'])
    ->name('reports.casesPerStreetData');

    Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/health-records', [HealthRecordController::class, 'indexForAdmin'])
        ->name('admin.health-records.index');
});

Route::middleware(['auth', CheckRole::class . ':admin'])->group(function () {
    Route::get('/admin/health-records', [\App\Http\Controllers\HealthRecordController::class, 'indexForAdmin'])
        ->name('admin.health-records.index');
});

