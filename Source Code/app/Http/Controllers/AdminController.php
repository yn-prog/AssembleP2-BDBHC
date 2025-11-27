<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\ActionLog;
use App\Models\HealthRecord;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function staff()
    {
        $staff = User::where('role', '!=', 'admin')->get();
        return view('admin.staff', compact('staff'));
    }

    public function staffEdit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.staff-edit', compact('user'));
    }

    public function staffUpdate(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'role' => 'required|in:physician,nurse,midwife,dentist,admin',
        ]);

        $user->update($request->only(['name', 'email', 'role']));

        return redirect()->route('admin.staff')->with('success', 'Staff member updated successfully.');
    }

    public function staffDestroy($id)
    {
        $user = User::findOrFail($id);
        
        if ($user->role === 'admin') {
            return redirect()->route('admin.staff')->with('error', 'Cannot delete admin user.');
        }

        $user->delete();

        return redirect()->route('admin.staff')->with('success', 'Staff member deleted successfully.');
    }

    public function systemHistory(Request $request)
    {
        $logs = ActionLog::with(['user', 'patient']);

        if ($request->filled('search')) {
            $searchTerm = $request->input('search');
            $logs->where(function($query) use ($searchTerm) {
                $query->whereHas('patient', function($q) use ($searchTerm) {
                    $q->where('first_name', 'LIKE', '%' . $searchTerm . '%')
                      ->orWhere('last_name', 'LIKE', '%' . $searchTerm . '%')
                      ->orWhereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ['%' . $searchTerm . '%']);
                })
                ->orWhereHas('user', function($q) use ($searchTerm) {
                    $q->where('name', 'LIKE', '%' . $searchTerm . '%');
                })
                ->orWhere('action_type', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('details', 'LIKE', '%' . $searchTerm . '%');
            });
        }

        // Filter by staff member
        if ($request->filled('staff_id')) {
            $logs->where('user_id', $request->staff_id);
        }

        // Filter by action type
        if ($request->filled('action_type')) {
            $logs->where('action_type', 'LIKE', '%' . $request->input('action_type') . '%');
        }

        // Filter by date range
        if ($request->filled('date_range')) {
            $today = now();

            switch ($request->input('date_range')) {
                case 'today':
                    $logs->whereDate('created_at', $today->toDateString());
                    break;

                case 'week':
                    $startOfWeek = $today->copy()->startOfWeek();
                    $endOfWeek = $today->copy()->endOfWeek();
                    $logs->whereBetween('created_at', [$startOfWeek, $endOfWeek]);
                    break;

                case 'month':
                    $startOfMonth = $today->copy()->startOfMonth();
                    $endOfMonth = $today->copy()->endOfMonth();
                    $logs->whereBetween('created_at', [$startOfMonth, $endOfMonth]);
                    break;

                case 'year':
                    $startOfYear = $today->copy()->startOfYear();
                    $endOfYear = $today->copy()->endOfYear();
                    $logs->whereBetween('created_at', [$startOfYear, $endOfYear]);
                    break;
            }
        }

        $actionLogs = $logs->orderBy('created_at', 'desc')->paginate(10);
        
        $staff = User::whereIn('role', ['physician', 'dentist', 'nurse', 'midwife', 'admin'])->get();

        return view('admin.history', compact('actionLogs', 'staff'));
    }

    public function liveSearch(Request $request)
    {
        $query = $request->get('query', '');
        $suggestions = [];

        if (strlen($query) >= 1) {
            // Search for patients
            $patients = \App\Models\HealthRecord::where('first_name', 'LIKE', $query . '%')
                ->orWhere('last_name', 'LIKE', $query . '%')
                ->orWhere(\DB::raw("CONCAT(first_name, ' ', last_name)"), 'LIKE', $query . '%')
                ->limit(5)
                ->get(['id', 'first_name', 'last_name']);

            foreach ($patients as $patient) {
                $suggestions[] = [
                    'type' => 'patient',
                    'value' => $patient->first_name . ' ' . $patient->last_name,
                    'label' => $patient->first_name . ' ' . $patient->last_name . ' (Patient)'
                ];
            }

            // Search for staff members with specific roles
            $staff = User::whereIn('role', ['physician', 'dentist', 'nurse', 'midwife', 'admin'])
                ->where('name', 'LIKE', $query . '%')
                ->limit(5)
                ->get(['id', 'name', 'role']);

            foreach ($staff as $staffMember) {
                $suggestions[] = [
                    'type' => 'staff',
                    'value' => $staffMember->name,
                    'label' => $staffMember->name . ' (' . ucfirst($staffMember->role) . ')'
                ];
            }
        }

        return response()->json($suggestions);
    }
}
