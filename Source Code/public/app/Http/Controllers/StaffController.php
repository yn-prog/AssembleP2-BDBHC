<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $staffMembers = Staff::all();
        return view('admin.staff-profile', compact('staffMembers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'email' => 'required|email|unique:staff,email',
            'phone' => 'nullable|string|max:20',
        ]);

        Staff::create($request->all());

        return redirect()->route('admin.staff-profile')
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

    public function update(Request $request, $id)
    {
        $staff = Staff::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'email' => 'required|email|unique:staff,email,' . $id,
            'phone' => 'nullable|string|max:20',
        ]);

        $staff->update($request->all());

        return redirect()->route('admin.staff-profile')
                        ->with('success', 'Staff member updated successfully.');
    }
}