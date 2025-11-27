<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CaseAreaSetting;

class CaseAreaSettingController extends Controller
{
    public function update(Request $request, $type)
    {
        
        $validated = $request->validate([
            'min_cases' => 'required|integer|min:0',
            'max_cases' => 'nullable|integer|gte:min_cases',
        ]);

        $setting = CaseAreaSetting::where('type', $type)->first();
        if (!$setting) return response()->json(['error' => 'Invalid type'], 404);

        $setting->update([
            'min_cases' => $validated['min_cases'],
            'max_cases' => $validated['max_cases'] ?? 999,
        ]);

        return response()->json(['message' => 'Threshold updated successfully']);
    }

    public function all()
    {
        return response()->json(CaseAreaSetting::all());
    }
}
