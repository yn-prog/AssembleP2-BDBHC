<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HealthRecord;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{ 
    
    public function report(Request $request)
    {
        $timePeriod = $request->input('time_period', 'all');
        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');
        
        // <CHANGE> Add separate date filters for age group distribution
        $ageDateFrom = $request->input('age_date_from');
        $ageDateTo = $request->input('age_date_to');
        
        $recordsQuery = HealthRecord::query();
        
        if ($dateFrom && $dateTo) {
            $recordsQuery->whereBetween('created_at', [$dateFrom . ' 00:00:00', $dateTo . ' 23:59:59']);
        } elseif ($timePeriod !== 'all') {
            $recordsQuery = $this->applyTimePeriodFilter($recordsQuery, $timePeriod);
        }
        
        $records = $recordsQuery->get();

        $getAgeGroup = function($age) {
            if ($age <= 14) return '0-14';
            if ($age <= 18) return '15-18';
            if ($age <= 59) return '19-59';
            return '60+';
        };

        // <CHANGE> Calculate age groups with independent date filter
        $ageGroupsQuery = HealthRecord::query();
        if ($ageDateFrom && $ageDateTo) {
            $ageGroupsQuery->whereBetween('created_at', [$ageDateFrom . ' 00:00:00', $ageDateTo . ' 23:59:59']);
        } elseif ($timePeriod !== 'all') {
            $ageGroupsQuery = $this->applyTimePeriodFilter($ageGroupsQuery, $timePeriod);
        }
        
        $ageGroupRecords = $ageGroupsQuery->get();
        
        $ageGroupsTotals = ['0-14' => 0, '15-18' => 0, '19-59' => 0, '60+' => 0];
        foreach ($ageGroupRecords as $record) {
            $age = \Carbon\Carbon::parse($record->birth_date)->age;
            $ageGroup = $getAgeGroup($age);
            $ageGroupsTotals[$ageGroup]++;
        }
        
        $genderTotals = ['Male' => 0, 'Female' => 0];
        $diagnosisTotals = [];
        $diagnosisBreakdown = [];

        foreach ($records as $record) {
            // Compute age from birth_date
            $age = \Carbon\Carbon::parse($record->birth_date)->age;

            $ageGroup = $getAgeGroup($age);
            $gender = $record->gender;

            $genderTotals[$gender]++;


            $diagnoses = $record->diagnoses->pluck('diagnosis_name')->toArray();


            foreach ($diagnoses as $diagnosis) {
                if (!isset($diagnosisTotals[$diagnosis])) {
                    $diagnosisTotals[$diagnosis] = 0;
                }
                $diagnosisTotals[$diagnosis]++;

                if (!isset($diagnosisBreakdown[$diagnosis])) {
                    $diagnosisBreakdown[$diagnosis] = [];
                }
                if (!isset($diagnosisBreakdown[$diagnosis][$ageGroup])) {
                    $diagnosisBreakdown[$diagnosis][$ageGroup] = ['Male' => 0, 'Female' => 0];
                }
                $diagnosisBreakdown[$diagnosis][$ageGroup][$gender]++;
            }
        }
        
        $diagnoses = \App\Models\Diagnosis::all();
        $totalDiagnosesTracked = $diagnoses->count();
        
        // ✅ Get all unique diagnoses (for dropdown)
        $allDiagnoses = \App\Models\HealthRecord::whereHas('diagnoses')
            ->with('diagnoses')
            ->get()
            ->pluck('diagnoses.*.diagnosis_name')
            ->flatten()
            ->unique()
            ->values();

        // Get selected filters
$selectedDiagnosis = $request->input('diagnosis');
$selectedStreet = $request->input('street');

$filteredRecords = HealthRecord::query();

if ($dateFrom && $dateTo) {
    $filteredRecords->whereBetween('created_at', [$dateFrom . ' 00:00:00', $dateTo . ' 23:59:59']);
} elseif ($timePeriod !== 'all') {
    $filteredRecords = $this->applyTimePeriodFilter($filteredRecords, $timePeriod);
}

if ($selectedDiagnosis) {
    $filteredRecords->whereHas('diagnoses', function ($query) use ($selectedDiagnosis) {
        $query->where('diagnosis_name', $selectedDiagnosis);
    });
}

// ✅ Apply street filter
if ($selectedStreet) {
    $filteredRecords->whereRaw("IFNULL(NULLIF(TRIM(street), ''), 'Unspecified') = ?", [$selectedStreet]);
}

// Compute cases per street
$casesPerStreet = $filteredRecords
    ->select(
        DB::raw("IFNULL(NULLIF(TRIM(street), ''), 'Unspecified') as street"),
        DB::raw('COUNT(*) as total')
    )
    ->groupBy('street')
    ->orderBy('total', 'desc')
    ->get();


            // ✅ For dropdown list of all streets
$allStreets = HealthRecord::select(DB::raw("IFNULL(NULLIF(TRIM(street), ''), 'Unspecified') as street"))
    ->distinct()
    ->orderBy('street')
    ->pluck('street');

        return view('reports', compact(
            'ageGroupsTotals',
            'genderTotals',
            'diagnosisTotals',
            'diagnosisBreakdown',
            'casesPerStreet',
            'allDiagnoses',
            'selectedDiagnosis',
            'allStreets',
            'selectedStreet',
            'totalDiagnosesTracked',
        ));
    }

public function casesPerStreetData(Request $request)
{
    $selectedStreet = $request->input('street');

    $recordsQuery = HealthRecord::query();

    if ($selectedStreet) {
        $recordsQuery->whereRaw("IFNULL(NULLIF(TRIM(street), ''), 'Unspecified') = ?", [$selectedStreet]);
    }

    $casesPerStreet = $recordsQuery
        ->select(
            DB::raw("IFNULL(NULLIF(TRIM(street), ''), 'Unspecified') as street"),
            DB::raw('COUNT(*) as total')
        )
        ->groupBy('street')
        ->orderBy('total', 'desc')
        ->get();

    return response()->json([
        'casesPerStreet' => $casesPerStreet
    ]);
}

    private function applyTimePeriodFilter($query, $period)
    {
        $now = now();
        
        switch ($period) {
            case 'today':
                return $query->whereDate('created_at', $now->toDateString());
            case 'week':
                return $query->whereBetween('created_at', [
                    $now->startOfWeek()->toDateString(),
                    $now->endOfWeek()->toDateString()
                ]);
            case 'month':
                return $query->whereMonth('created_at', $now->month)
                            ->whereYear('created_at', $now->year);
            case 'year':
                return $query->whereYear('created_at', $now->year);
            default:
                return $query;
        }
    }

    public function update(Request $request, $id)
    {
        $record = HealthRecord::findOrFail($id);

        $record->update([
            // 'age' => $request->input('age'),
            'gender' => $request->input('gender'),
            'medical_diagnosis' => $request->input('medical_diagnosis'),
            // Add other fields here
        ]);

        return redirect()->route('reports'); // 🔁 This refreshes the report page with updated data
    }

    public function showReport()
    {
        $casesPerStreet = DB::table('health_records')
            ->select('street', DB::raw('COUNT(*) as total'))
            ->whereNotNull('street')
            ->groupBy('street')
            ->orderBy('total', 'desc')
            ->get();

        return view('reports', [
            'ageGroupsTotals' => $this->getAgeGroupData(),
            'genderTotals' => $this->getGenderData(),
            'diagnosisBreakdown' => $this->getDiagnosisBreakdown(),
            'casesPerStreet' => $casesPerStreet, // ✅ Add this line
        ]);
    }

    public function getGenderBreakdown(Request $request)
    {
        $diagnosis = $request->input('diagnosis');

        $breakdown = HealthRecord::whereHas('diagnoses', function ($query) use ($diagnosis) {
            $query->where('diagnosis_name', $diagnosis);
        })
        ->select('gender', DB::raw('count(*) as total'))
        ->groupBy('gender')
        ->pluck('total', 'gender');

        return response()->json($breakdown);
    }

    private function getAgeGroupData()
    {
        $records = HealthRecord::all();
        $getAgeGroup = function($age) {
            if ($age <= 14) return '0-14';
            if ($age <= 18) return '15-18';
            if ($age <= 59) return '19-59';
            return '60+';
        };

        $ageGroupsTotals = ['0-14' => 0, '15-18' => 0, '19-59' => 0, '60+' => 0];

        foreach ($records as $record) {
            $age = \Carbon\Carbon::parse($record->birth_date)->age;
            $ageGroup = $getAgeGroup($age);
            $ageGroupsTotals[$ageGroup]++;
        }

        return $ageGroupsTotals;
    }

    private function getGenderData()
    {
        $records = HealthRecord::all();
        $genderTotals = ['Male' => 0, 'Female' => 0];

        foreach ($records as $record) {
            $gender = $record->gender;
            $genderTotals[$gender]++;
        }

        return $genderTotals;
    }

    private function getDiagnosisBreakdown()
    {
        $records = HealthRecord::all();
        $diagnosisBreakdown = [];

        foreach ($records as $record) {
            $age = \Carbon\Carbon::parse($record->birth_date)->age;
            $ageGroup = $this->getAgeGroup($age);
            $gender = $record->gender;

            $diagnoses = $record->diagnoses->pluck('diagnosis_name')->toArray();

            foreach ($diagnoses as $diagnosis) {
                if (!isset($diagnosisBreakdown[$diagnosis])) {
                    $diagnosisBreakdown[$diagnosis] = [];
                }
                if (!isset($diagnosisBreakdown[$diagnosis][$ageGroup])) {
                    $diagnosisBreakdown[$diagnosis][$ageGroup] = ['Male' => 0, 'Female' => 0];
                }
                $diagnosisBreakdown[$diagnosis][$ageGroup][$gender]++;
            }
        }

        return $diagnosisBreakdown;
    }

    private function getAgeGroup($age)
    {
        if ($age <= 14) return '0-14';
        if ($age <= 18) return '15-18';
        if ($age <= 59) return '19-59';
        return '60+';
    }
}