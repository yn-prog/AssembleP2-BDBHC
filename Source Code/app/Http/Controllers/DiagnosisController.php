<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diagnosis;
use Illuminate\Support\Facades\Auth;
class DiagnosisController extends Controller
{
  public function store(Request $request)
{
    $request->validate([
        'diagnosis_name' => 'required|string|max:255',
        'roles' => 'array|min:1',
    ]);

    Diagnosis::create([
        'diagnosis_name' => $request->diagnosis_name,
        'visible_to_roles' => collect($request->roles)->map(fn($r) => strtolower($r))->unique()->values(),
    ]);

    return redirect()->back()->with('success', 'Diagnosis created successfully!');
}


public function index()
{
    $userRole = Auth::user()->role;

    // Fetch diagnoses visible to the user's role
    $diagnoses = Diagnosis::whereJsonContains('visible_to_roles', $userRole)->get();

    return view('diagnoses.index', compact('diagnoses'));
}


public function update(Request $request, $id)
{
    $request->validate([
        'diagnosis_name' => 'required|string|max:255',
        'roles' => 'array|min:1',
    ]);

    $diagnosis = Diagnosis::findOrFail($id);
    $diagnosis->update([
        'diagnosis_name' => $request->diagnosis_name,
        'visible_to_roles' => collect($request->roles)->map(fn($r) => strtolower($r))->unique()->values(),
    ]);

    return redirect()->back()->with('success', 'Diagnosis updated successfully!');
}


}
