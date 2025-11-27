<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HealthRecord;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
   public function report()
{
    $records = HealthRecord::all();

    $getAgeGroup = function($age) {
        if ($age <= 14) return '0-14';
        if ($age <= 18) return '15-18';
        if ($age <= 59) return '19-59';
        return '60+';
    };

    $ageGroupsTotals = ['0-14' => 0, '15-18' => 0, '19-59' => 0, '60+' => 0];
    $genderTotals = ['Male' => 0, 'Female' => 0];
    $diagnosisTotals = [];
    $diagnosisBreakdown = [];

    foreach ($records as $record) {
        $ageGroup = $getAgeGroup($record->age);
        $gender = $record->gender;

        // Update overall age and gender counts
        $ageGroupsTotals[$ageGroup]++;
        $genderTotals[$gender]++;

        $purposes = is_string($record->visit_purpose)
    ? json_decode($record->visit_purpose, true)
    : ($record->visit_purpose ?? []);

        foreach ($purposes as $purpose) {
            // safe
        }


        // Decode JSON diagnoses array
        $diagnoses = is_string($record->medical_diagnosis)
        ? json_decode($record->medical_diagnosis, true)
        : ($record->medical_diagnosis ?? []);

        foreach ($diagnoses as $diagnosis) {
        // now it's safe
            // Diagnosis total counts
            if (!isset($diagnosisTotals[$diagnosis])) {
                $diagnosisTotals[$diagnosis] = 0;
            }
            $diagnosisTotals[$diagnosis]++;

            // Init breakdown structure
            if (!isset($diagnosisBreakdown[$diagnosis])) {
                $diagnosisBreakdown[$diagnosis] = [];
            }
            if (!isset($diagnosisBreakdown[$diagnosis][$ageGroup])) {
                $diagnosisBreakdown[$diagnosis][$ageGroup] = ['Male' => 0, 'Female' => 0];
            }
            $diagnosisBreakdown[$diagnosis][$ageGroup][$gender]++;
        }
    }

   // ✅ Add street count here
    $casesPerStreet = DB::table('health_records')
        ->select('street', DB::raw('COUNT(*) as total'))
        ->whereNotNull('street')
        ->groupBy('street')
        ->orderBy('total', 'desc')
        ->get();

    return view('reports', compact(
        'ageGroupsTotals',
        'genderTotals',
        'diagnosisTotals',
        'diagnosisBreakdown',
        'casesPerStreet' // ✅ Pass to Blade
    ));
}


public function update(Request $request, $id)
{
    $record = HealthRecord::findOrFail($id);

    $record->update([
        'age' => $request->input('age'),
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

}
