<?php

namespace App\Http\Controllers;
use App\Models\ActionLog;
use App\Models\HealthRecord;
use Illuminate\Http\Request;
use Carbon\Carbon;  // make sure this is imported at the top
class HealthRecordController extends Controller

{
    // Show blank form
    
    
    public function create()
    {
        return view('health-records.form');
    }
    public function index()
{
    $healthRecords = HealthRecord::all();    
    $healthRecords = HealthRecord::orderBy('created_at', 'desc')->paginate(10); // 10 per page
    return view('health_records', compact('healthRecords'));
}


public function countToday()
{
    $today = Carbon::today()->toDateString();  // simplified
    $records = HealthRecord::whereDate('created_at', $today)->get();

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
        'age' => 'required|integer',
        'gender' => 'required|string',
        'birth_date' => 'required|string|max:50',
        'height' => 'nullable|numeric',
        'weight' => 'nullable|numeric',
        'contact_number' => 'nullable|string|max:20',
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
    ]);

    // Validate that at least one of the two is provided
    if (empty($request->visit_purpose) && empty($request->medical_diagnosis)) {
        return back()->withErrors([
            'visit_purpose' => 'Please provide at least a Visit Purpose or a Medical Diagnosis.',
            'medical_diagnosis' => 'Please provide at least a Visit Purpose or a Medical Diagnosis.',
        ])->withInput();
    }

    // Handle "Others" logic for visit purpose
    $purposes = $request->visit_purpose ?? [];
    if (in_array('Others', $purposes) && $request->filled('other_purpose')) {
        $purposes = array_diff($purposes, ['Others']);
        $purposes[] = $request->other_purpose;
    }

    // Handle "Others" logic for diagnosis
    $diagnoses = $request->medical_diagnosis ?? [];
    if (in_array('Others', $diagnoses) && $request->filled('other_diagnosis')) {
        $diagnoses = array_diff($diagnoses, ['Others']);
        $diagnoses[] = $request->other_diagnosis;
    }

    // Store all data
    $record = HealthRecord::create([
        'first_name' => $validated['first_name'],
        'last_name' => $validated['last_name'],
        'age' => $validated['age'],
        'gender' => $validated['gender'],
        'birth_date' => date('Y-m-d', strtotime($request->birth_date)),
        'height' => $validated['height'],
        'weight' => $validated['weight'],
        'contact_number' => $validated['contact_number'],
        'street' => $validated['street'],
        'address' => $validated['address'],
        'visit_purpose' => json_encode($purposes),
        'medical_diagnosis' => json_encode($diagnoses),
        'given_medicine' => $validated['given_medicine'],
        'other_purpose' => $request->other_purpose,
        'other_diagnosis' => $request->other_diagnosis,
        'date_consulted' => $validated['date_consulted'],

    ]);

    return redirect()->back()->with('success', 'Health record added successfully!');
}

public function update(Request $request, $id)
{
    /** @var \App\Models\HealthRecord $record */
    $record = HealthRecord::findOrFail($id);
    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'age' => 'required|integer',
        'birth_date' => 'required|date',
        'gender' => 'required|string',
        'height' => 'nullable|numeric',
        'weight' => 'nullable|numeric',
        'contact_number' => 'nullable|string|max:20',
        'street' => 'required|string',
        'address' => 'required|string',
        'visit_purpose' => ['nullable', 'required_without:medical_diagnosis', 'array'],
        'medical_diagnosis' => ['nullable', 'required_without:visit_purpose', 'array'],
        'other_purpose' => 'nullable|string',
        'other_diagnosis' => 'nullable|string',
        'given_medicine' => 'nullable|string',
        'date_consulted' => 'required|date',
    ]);
  
    if (empty($request->visit_purpose) && empty($request->medical_diagnosis)) {
        return back()->withErrors([
            'visit_purpose' => 'Please provide at least a Visit Purpose or a Medical Diagnosis.',
            'medical_diagnosis' => 'Please provide at least a Visit Purpose or a Medical Diagnosis.',
        ])->withInput();
    }

    $purposes = $request->visit_purpose ?? [];
    if (in_array('Others', $purposes) && $request->filled('other_purpose')) {
        $purposes = array_diff($purposes, ['Others']);
        $purposes[] = $request->other_purpose;
    }

    $diagnoses = $request->medical_diagnosis ?? [];
    if (in_array('Others', $diagnoses) && $request->filled('other_diagnosis')) {
        $diagnoses = array_diff($diagnoses, ['Others']);
        $diagnoses[] = $request->other_diagnosis;
    }

    $purposes = array_values(array_unique($purposes));
    $diagnoses = array_values(array_unique($diagnoses));

    $record = HealthRecord::findOrFail($id);
    $record->fill($validated);
    $record->visit_purpose = json_encode($purposes);
    $record->medical_diagnosis = json_encode($diagnoses);
    $record->other_purpose = $request->other_purpose ?? null;
    $record->other_diagnosis = $request->other_diagnosis ?? null;
    $record->birth_date = $request->birth_date;
    $record->date_consulted = $request->input('date_consulted');
    $record->save();

;


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
}