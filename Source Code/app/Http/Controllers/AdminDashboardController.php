<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HealthRecord;
use App\Models\ActionLog;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalPatients = HealthRecord::count();
        $newToday = HealthRecord::whereDate('created_at', now()->toDateString())->count();
        $latestPatients = HealthRecord::orderBy('date_consulted', 'desc')->take(5)->get();

        $editedRecordsCount = ActionLog::where('action_type', 'Edited Record')->count();

        $latestEditedRecords = ActionLog::with(['user', 'patient'])
            ->whereHas('patient') // Only get logs where patient exists
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalPatients',
            'newToday',
            'latestPatients',
            'editedRecordsCount',
            'latestEditedRecords'
        ));
    }
}
