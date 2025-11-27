<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MapDataController extends Controller
{
   public function getGeoData()
{
    try {
        function normalizeStreet($street)
        {
            return strtolower(preg_replace('/[^a-z0-9]/i', '', $street));
        }

        $records = DB::table('health_records')
            ->join('health_records_medical_diagnoses', 'health_records.id', '=', 'health_records_medical_diagnoses.health_record_id')
            ->join('diagnoses', 'health_records_medical_diagnoses.diagnosis_id', '=', 'diagnoses.id')
            ->select('health_records.street', 'diagnoses.diagnosis_name')
            ->whereNotNull('health_records.street')
            ->where('health_records.street', '!=', '')
            ->where('health_records.street', '!=', 'Barangay Daang Bakal')
            ->get();

        $streetData = [];

        foreach ($records as $record) {
            $streetKey = normalizeStreet($record->street);
            $label = trim($record->street);
            $diagnosis = $record->diagnosis_name;

            if (!isset($streetData[$streetKey])) {
                $streetData[$streetKey] = [
                    'label' => $label,
                    'total_cases' => 0,
                    'diagnoses' => [],
                    'diagnosis_counts' => []
                ];
            }

            $streetData[$streetKey]['total_cases']++;
            $streetData[$streetKey]['diagnoses'][] = $diagnosis;

            // ✅ Correctly placed inside the loop
            if (!isset($streetData[$streetKey]['diagnosis_counts'][$diagnosis])) {
                $streetData[$streetKey]['diagnosis_counts'][$diagnosis] = 1;
            } else {
                $streetData[$streetKey]['diagnosis_counts'][$diagnosis]++;
            }
        }

        foreach ($streetData as &$entry) {
            $entry['diagnoses'] = array_values(array_unique($entry['diagnoses']));
        }

        return response()->json($streetData);
    } catch (\Exception $e) {
        Log::error('Error in getGeoData: ' . $e->getMessage());
        return response()->json(['error' => 'Internal Server Error'], 500);
    }
}

    public function getStreetDetails($street)
    {
        try {
            $records = DB::table('health_records')
                ->where('street', $street)
                ->select('first_name', 'last_name', 'medical_diagnosis', 'date_consulted', 'gender')
                ->orderBy('date_consulted', 'desc')
                ->get();

            $details = [
                'street' => $street,
                'total_patients' => $records->count(),
                'recent_cases' => $records->take(5)->map(function($record) {
                    $diagnoses = json_decode($record->medical_diagnosis, true);
                    if (!is_array($diagnoses)) {
                        $diagnoses = [$record->medical_diagnosis];
                    }
                    
                    return [
                        'name' => $record->first_name . ' ' . $record->last_name,
                        'diagnoses' => implode(', ', $diagnoses),
                        'date' => $record->date_consulted,
                        'gender' => $record->gender
                    ];
                })
            ];

            return response()->json($details);
            
        } catch (\Exception $e) {
            Log::error('Error in getStreetDetails: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to fetch street details'], 500);
        }
    }

    // Debug method to check what streets exist in database vs GeoJSON
    public function debugStreets()
    {
        try {
            $dbStreets = DB::table('health_records')
                ->select('street', DB::raw('count(*) as count'))
                ->whereNotNull('street')
                ->where('street', '!=', '')
                ->groupBy('street')
                ->orderBy('count', 'desc')
                ->get();

            $geojsonStreets = [
                'Barangay Daang Bakal',
                'P. Martinez Street',
                'Sen. Neptali Gonzales Street', 
                'V. Fabella Street',
                'E. Magalona Street',
                'F. Bernardo St.',
                'Gen.Kalentong Street',
                'Haig Street',
                'J. Tiosejo',
                'Romualdez Street',
                'Ochoa Building',
                'Gomega Condominiums'
            ];

            // Check for exact matches
            $matches = [];
            $mismatches = [];

            foreach ($dbStreets as $dbStreet) {
                if (in_array($dbStreet->street, $geojsonStreets)) {
                    $matches[] = $dbStreet->street;
                } else {
                    $mismatches[] = $dbStreet->street;
                }
            }

            return response()->json([
                'database_streets' => $dbStreets,
                'geojson_streets' => $geojsonStreets,
                'exact_matches' => $matches,
                'mismatches' => $mismatches,
                'total_records' => $dbStreets->sum('count')
            ]);
            
        } catch (\Exception $e) {
            Log::error('Error in debugStreets: ' . $e->getMessage());
            return response()->json(['error' => 'Debug failed'], 500);
        }
    }
}
