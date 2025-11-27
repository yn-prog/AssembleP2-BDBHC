<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HealthRecord;
use Illuminate\Support\Facades\DB;
use App\Models\CaseAreaSetting;
use App\Models\Diagnosis;

class DashboardController extends Controller
{
    public function index()
    {
        $latestPatients = HealthRecord::orderBy('updated_at', 'desc')->take(10)->get();

        $ageGroups = [
            '0-14' => DB::table('health_records')->whereBetween('age', [0, 14])->count(),
            '15-19' => DB::table('health_records')->whereBetween('age', [15, 19])->count(),
            '20-65' => DB::table('health_records')->whereBetween('age', [20, 64])->count(),
            '60+'   => DB::table('health_records')->where('age', '>=', 60)->count(),
        ];

        $genderCount = [
            'Male' => DB::table('health_records')->where('gender', 'Male')->count(),
            'Female' => DB::table('health_records')->where('gender', 'Female')->count(),
        ];

    //  $diagnoses = DB::table('health_records')
    // ->select('medical_diagnosis', DB::raw('count(*) as total'))
    // ->groupBy('medical_diagnosis')
    // ->pluck('total', 'medical_diagnosis');

        $diagnoses = Diagnosis::withCount('records')->get()->pluck('records_count', 'diagnosis_name');


        $thresholds = CaseAreaSetting::all()->keyBy('type');

        return view('dashboard', compact(
            'latestPatients',
            'ageGroups',
            'genderCount',
            'diagnoses',
            'thresholds'
        ));
    }
}
