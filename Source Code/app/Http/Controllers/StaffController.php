<?php

namespace App\Http\Controllers;
use App\Models\Diagnosis;
use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CaseAreaSetting;
use Illuminate\Support\Facades\Auth;
class StaffController extends Controller
{
   public function index(Request $request)
{
    $staff = User::all();
    $archivedRecords = \App\Models\HealthRecord::onlyTrashed()
                        ->orderBy('deleted_at', 'desc')
                        ->get();
    $thresholds = CaseAreaSetting::all()->keyBy('type');

    // ✅ Base query (no role filter here)
    $query = Diagnosis::query();

    // ✅ Apply search if typed
    if ($request->filled('search')) {
        $query->where('diagnosis_name', 'like', '%' . $request->search . '%');
    }

    // ✅ Order + paginate
    $diagnoses = $query->orderBy('diagnosis_name')->paginate(10);

    // ✅ Keep search term when paginating
    $diagnoses->appends(['search' => $request->search]);

    return view('admin.staff', compact('staff', 'archivedRecords', 'thresholds', 'diagnoses'));
}

public function ajaxDiagnosisSearch(Request $request)
{
     $search = $request->input('search');
    $diagnoses = Diagnosis::where('diagnosis_name', 'like', '%' . $search . '%')
        ->orderBy('diagnosis_name')
        ->limit(20)
        ->get()
        ->map(function ($diagnosis) {
            return [
                'id' => $diagnosis->id,
                'diagnosis_name' => $diagnosis->diagnosis_name,
                'visible_to_roles' => is_array($diagnosis->visible_to_roles)
                    ? $diagnosis->visible_to_roles
                    : (json_decode($diagnosis->visible_to_roles, true) ?: []),
            ];
        });

    return response()->json($diagnoses);
}

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|in:physician,nurse,midwife,dentist,user,admin',
            'email' => 'required|email|unique:staff,email',
            'phone' => 'nullable|string|max:20',
            
        ]);

        Staff::create($request->all());

       return redirect()->route('admin.staff')
                ->with('success', 'Staff member added successfully.');
    }

    public function show($id)
    {
        $staff = Staff::findOrFail($id);
        return view('admin.staff-view', compact('staff'));
    }

    public function edit($id)
    {
        $staff = Staff::findOrFail($id);
        return view('admin.staff-edit', compact('staff'));
    }

    public function updateRole(Request $request, $id)
{
    $request->validate([
        'role' => 'required|in:physician,nurse,midwife,dentist,user,admin',
    ]);

    $user = User::find($id);

    if (!$user) {
        return response()->json(['error' => 'User not found.'], 404);
    }

    $user->role = $request->role;
    $user->save();

    return response()->json(['success' => 'Role updated successfully.']);
}

    public function archivedPatients()
{
    $archivedRecords = \App\Models\HealthRecord::onlyTrashed()->orderBy('deleted_at', 'desc')->get();
    return view('staff', compact('archivedRecords'));
}

}