<?php

namespace App\Http\Controllers;
use App\Models\ActionLog;
use App\Models\HealthRecord;
use App\Models\HistoryRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;  // make sure this is imported at the top

class HealthRecordController extends Controller

{
    // Show blank form
    public function create()
    {
        $userRole = Auth::user()->role;
    $diagnoses = \App\Models\Diagnosis::whereJsonContains('visible_to_roles', $userRole)->get();
    return view('health-records.form', compact('diagnoses'));
    }
   
   
 public function index(Request $request)
{
    $query = HealthRecord::query();
    $userRole = Auth::user()->role;

    if ($request->filled('gender')) {
        $query->where('gender', $request->gender);
    }

    if ($request->filled('search')) {
    $search = $request->input('search');
    $query->where(function ($q) use ($search) {
        $q->where('id', $search) // Exact match for ID
          ->orWhere('first_name', 'LIKE', "%{$search}%")
          ->orWhere('last_name', 'LIKE', "%{$search}%");
    });
}


    if ($request->filled('visit_purpose')) {
    $query->whereJsonContains('visit_purpose', $request->visit_purpose);
}


    if ($request->filled('visit_purpose_search')) {
    $query->whereJsonContains('visit_purpose', $request->visit_purpose_search);
}


    if ($request->filled('medical_diagnosis')) {
        $query->whereHas('diagnoses', function ($q) use ($request) {
            $q->where('diagnosis_name', $request->medical_diagnosis);
        });
    }

    if ($request->filled('medical_diagnosis_search')) {
        $query->whereHas('diagnoses', function ($q) use ($request) {
            $q->where('diagnosis_name', 'LIKE', '%' . $request->medical_diagnosis_search . '%');
        });
    }

    $healthRecords = $query->orderBy('updated_at', 'desc')
        ->paginate(10)
        ->appends($request->query());


    $allPurposes = HealthRecord::select('visit_purpose')
        ->whereNotNull('visit_purpose')
        ->pluck('visit_purpose')
        ->filter() // remove empty
        ->flatMap(function ($purpose) {
            return json_decode($purpose, true) ?: [$purpose]; // handle JSON or plain text
        })
        ->unique()
        ->sort()
        ->values();

    $diagnoses = \App\Models\Diagnosis::whereJsonContains('visible_to_roles', $userRole)
    ->orderBy('diagnosis_name')
    ->get(['id', 'diagnosis_name']);


    /*
    |--------------------------------------------------------------------
    | Role-specific arrays
    |--------------------------------------------------------------------
    */
    $dentistDiagnoses = ["Oral Stomatitis", "Tooth Extraction", "Maxillary Abscess"];
    $midwifeDiagnoses = ["Abortion", "Vaginitis"];
    $dentistPurposes = ["Dental Check-up"];
    $midwifePurposes = ["Prenatal Check"];
    $allPurposes =  ["Blood Pressure Monitoring", "Immunization", "Dental Check-up", "Prenatal Check", "General Check-up"];

    return view('health_records', compact(
        'healthRecords',
        'userRole',
        'dentistDiagnoses',
        'midwifeDiagnoses',
        'allPurposes',
        'dentistPurposes',
        'midwifePurposes',
        'diagnoses'
        
    ));
}



public function countToday() 
{
    $today = Carbon::today()->toDateString();  

    $records = HealthRecord::whereDate('updated_at', $today)
        ->select('first_name', 'last_name', 'birth_date')
        ->distinct()
        ->get();

    return response()->json([
        'today' => $today,
        'count' => $records->count(),
        'records' => $records
    ]);
}

    public function countTotal()
    {
        $countTotal = HealthRecord::count();
        return response()->json(['count' => $countTotal]);
    }
    

    // Store new record
public function store(Request $request)
{
    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'gender' => 'required|string',
        'birth_date' => 'required|string|max:50',
        'height' => 'nullable|numeric',
        'weight' => 'nullable|numeric',
        'contact_number' => 'nullable|string|max:20',
        'philhealth_number' => 'nullable|string|max:50',
        'street' => 'required|string',
        'address' => 'required|string',
        'visit_purpose' => 'required_without:medical_diagnosis|array',
        'visit_purpose.*' => 'string',
        'other_purpose' => 'nullable|string',
        'medical_diagnosis' => 'required_without:visit_purpose|array',
        'medical_diagnosis.*' => 'string',
        'other_diagnosis' => 'nullable|string',
        'given_medicine' => 'nullable|string',
        'date_consulted' => 'required|date',
        'blood_type' => 'nullable|string|in:A+,A-,B+,B-,AB+,AB-,O+,O-',
    ]);

    if (empty($request->visit_purpose) && empty($request->medical_diagnosis)) {
        return back()->withErrors([
            'visit_purpose' => 'Please provide at least a Visit Purpose or a Medical Diagnosis.',
            'medical_diagnosis' => 'Please provide at least a Visit Purpose or a Medical Diagnosis.',
        ])->withInput();
    }

    // Handle "Others" in visit purpose
    $purposes = $request->visit_purpose ?? [];
    if (in_array('Others', $purposes) && $request->filled('other_purpose')) {
        $purposes = array_diff($purposes, ['Others']);
        $purposes[] = $request->other_purpose;
    }

    // Handle "Others" in medical diagnosis
    $recordOtherDiagnosis = null;
    if (in_array('Others', $request->medical_diagnosis ?? []) && $request->filled('other_diagnosis')) {
        $recordOtherDiagnosis = $request->other_diagnosis;
    }

    // Store record
    $record = HealthRecord::create([
        'first_name' => $validated['first_name'],
        'last_name' => $validated['last_name'],
        'gender' => $validated['gender'],
        'birth_date' => date('Y-m-d', strtotime($request->birth_date)),
        'blood_type' => $request->blood_type,
        'height' => $validated['height'],
        'weight' => $validated['weight'],
        'contact_number' => $validated['contact_number'],
        'philhealth_number' => $request->philhealth_number,
        'street' => $validated['street'],
        'address' => $validated['address'],
        'visit_purpose' => json_encode(array_values(array_unique($purposes))),
        'given_medicine' => $validated['given_medicine'],
        'other_purpose' => $request->other_purpose,
        'other_diagnosis' => $recordOtherDiagnosis,
        'date_consulted' => $validated['date_consulted'],
        'status' => 'Under Treatment',
    ]);

    // Sync diagnoses
    $diagnosisIds = collect($request->medical_diagnosis ?? [])
        ->filter(fn($id) => is_numeric($id))
        ->toArray();
    $record->diagnoses()->sync($diagnosisIds);

    // Create history
    HistoryRecord::create([
        'health_record_id' => $record->id,
        'user_id' => Auth::id(),
        'consultation_date' => $record->date_consulted,
        'visit_purpose' => implode(', ', json_decode($record->visit_purpose ?? '[]', true)),
        'medical_diagnosis' => implode(', ', $record->diagnoses()->pluck('diagnosis_name')->toArray()),
        'given_medicine' => $record->given_medicine,
        'status' => $record->status,
    ]);

    ActionLog::create([
        'user_id' => Auth::id(),
        'patient_id' => $record->id,
        'action_type' => 'Created Record',
        'details' => 'Added a new record',
    ]);

    return redirect()->back()->with('success', 'Health record added successfully!');
}



public function update(Request $request, $id)
{
    $record = HealthRecord::findOrFail($id);

    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'birth_date' => 'required|date',
        'blood_type' => 'nullable|string|in:A+,A-,B+,B-,AB+,AB-,O+,O-',
        'gender' => 'required|string',
        'height' => 'nullable|numeric',
        'weight' => 'nullable|numeric',
        'contact_number' => 'nullable|string|max:20',
        'philhealth_number' => 'nullable|string|max:50',
        'street' => 'required|string',
        'address' => 'required|string',
        'visit_purpose' => ['nullable', 'required_without:medical_diagnosis', 'array'],
        'other_purpose' => 'nullable|string',
        'medical_diagnosis' => ['nullable', 'required_without:visit_purpose', 'array'],
        'other_diagnosis' => 'nullable|string',
        'given_medicine' => 'nullable|string',
        'date_consulted' => 'required|date',
        'status' => 'required|in:Cleared,Under Treatment',
    ]);

    if (empty($request->visit_purpose) && empty($request->medical_diagnosis)) {
        return back()->withErrors([
            'visit_purpose' => 'Please provide at least a Visit Purpose or a Medical Diagnosis.',
            'medical_diagnosis' => 'Please provide at least a Visit Purpose or a Medical Diagnosis.',
        ])->withInput();
    }

    // Handle "Others" in visit purpose
    $purposes = $request->visit_purpose ?? [];
    if (in_array('Others', $purposes) && $request->filled('other_purpose')) {
        $purposes = array_diff($purposes, ['Others']);
        $purposes[] = $request->other_purpose;
    }

    // Handle "Others" in medical diagnosis (same logic as store)
    if (in_array('Others', $request->medical_diagnosis ?? []) && $request->filled('other_diagnosis')) {
        $record->other_diagnosis = $request->other_diagnosis;
    } else {
        $record->other_diagnosis = null;
    }

    // Only numeric diagnosis IDs go into pivot
    $diagnosisIds = collect($request->medical_diagnosis ?? [])
        ->filter(fn($id) => is_numeric($id))
        ->toArray();

    // Fill and save record
    $record->fill($validated);
    $record->philhealth_number = $request->philhealth_number;
    $record->visit_purpose = json_encode(array_values(array_unique($purposes)));
    $record->other_purpose = $request->other_purpose ?? null;
    $record->birth_date = $request->birth_date;
    $record->date_consulted = $request->input('date_consulted');
    $record->save();

    // Sync pivot table
    $record->diagnoses()->sync($diagnosisIds);

    // Prepare diagnosis names for history
    $diagnosisNames = $record->diagnoses()->pluck('diagnosis_name')->toArray();
    if (!empty($record->other_diagnosis)) {
        $diagnosisNames[] = $record->other_diagnosis;
    }

    // Save to history
    HistoryRecord::create([
        'health_record_id' => $record->id,
        'user_id' => Auth::id(),
        'consultation_date' => $record->date_consulted,
        'visit_purpose' => implode(', ', json_decode($record->visit_purpose, true)),
        'medical_diagnosis' => implode(', ', $diagnosisNames),
        'given_medicine' => $record->given_medicine,
        'status' => $record->status,
    ]);

    // Log action
    ActionLog::create([
        'user_id' => Auth::id(),
        'patient_id' => $record->id,
        'action_type' => 'Edited Record',
        'details' => 'Updated patient record',
    ]);
    

    return redirect()->route('health.records')->with('success', 'Health record updated successfully!');
}


public function destroy($id)
{
    /** @var \App\Models\HealthRecord $record */
    $record = HealthRecord::findOrFail($id);
    $record->delete();

;

    return redirect()->route('health.records')->with('success', 'Patient record deleted successfully.');
}


public function showHistory($id, Request $request)
{
    $patient = HealthRecord::findOrFail($id);

    $query = HistoryRecord::with('user')
        ->where('health_record_id', $id);

    // ✅ Filter by diagnosis
    if ($request->filled('diagnosis')) {
        $query->where('medical_diagnosis', 'LIKE', '%' . $request->diagnosis . '%');
    }

    // ✅ Filter by date
    if ($request->filled('date')) {
        $query->whereDate('created_at', $request->date);
    }

    $history = $query->orderBy('created_at', 'desc')->get();

    // ✅ Get all distinct diagnoses for the dropdown
    $allDiagnoses = HistoryRecord::where('health_record_id', $id)
        ->select('medical_diagnosis')
        ->distinct()
        ->pluck('medical_diagnosis');

    return view('historyrecords', compact('patient', 'history', 'allDiagnoses'));
}



public function archive($id)
{
    // ✅ Role check: only allow physicians
    if (Auth::user()->role !== 'admin') {
        abort(403, 'Unauthorized access.');
    }

    $record = HealthRecord::find($id);

    if (!$record) {
        return redirect()->back()->with('error', 'Record not found.');
    }

    $record->delete(); // or ->update(['deleted_at' => now()]) if soft delete

    ActionLog::create([
        'user_id' => Auth::id(),
        'patient_id' => $record->id,
        'action_type' => 'Archived Record',
        'details' => 'Archived this patient record',
    ]);

    return redirect()->back()->with('success', 'Patient record archived successfully.');
}

public function restore($id)
{
    $record = HealthRecord::withTrashed()->findOrFail($id);
    $record->restore();

    return redirect()->back()->with('success', 'Patient record restored successfully.');
}
public function view($id)
{
    $userRole = strtolower(Auth::user()->role);

    $diagnoses = \App\Models\Diagnosis::whereJsonContains('visible_to_roles', $userRole)->get();
    $record = HealthRecord::withTrashed()->findOrFail($id);

    // Log the view
    ActionLog::create([
        'user_id'    => Auth::id(),
        'patient_id' => $record->id,
        'action_type'=> 'Viewed Record',
        'details'    => 'Viewed patient record',
    ]);

    return response()->json([
        'record' => $record,
        'medical_diagnosis' => $record->diagnoses->pluck('id'),
        'other_diagnosis' => $record->other_diagnosis, // ✅ Send "Others" text to edit form
        'diagnoses' => $diagnoses,
    ]);
}
public function indexForAdmin()
{
    $userRole = 'admin';

    $healthRecords = HealthRecord::latest()->paginate(10);

    // Dynamic list of all visit purposes
    $allPurposes = HealthRecord::select('visit_purpose')
        ->whereNotNull('visit_purpose')
        ->pluck('visit_purpose')
        ->filter()
        ->flatMap(function ($purpose) {
            return json_decode($purpose, true) ?: [$purpose];
        })
        ->unique()
        ->sort()
        ->values();

    $dentistDiagnoses = ["Oral Stomatitis", "Tooth Extraction", "Maxillary Abscess"];
    $midwifeDiagnoses = ["Abortion", "Vaginitis"];
    $dentistPurposes = ["Dental Check-up"];
    $midwifePurposes = ["Prenatal Check"];

    $diagnoses = \App\Models\Diagnosis::whereJsonContains('visible_to_roles', $userRole)
        ->orderBy('diagnosis_name')
        ->get(['id', 'diagnosis_name']);

    return view('admin.health_records', compact(
        'healthRecords',
        'userRole',
        'allPurposes',
        'dentistDiagnoses',
        'midwifeDiagnoses',
        'dentistPurposes',
        'midwifePurposes',
        'diagnoses'
    ));
}




}
