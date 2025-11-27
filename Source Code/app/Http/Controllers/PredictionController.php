<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PredictionController extends Controller
{
    public function index()
    {
        return view('prediction'); // just load the page
    }

    public function predict(Request $request)
    {
        // Example input features (you can adjust based on your model)
        $features = [
            (int) $request->input('age'),
            (int) $request->input('gender'),
            (int) $request->input('symptom')
        ];

        // Call Flask API
        $response = Http::post('http://127.0.0.1:5000/predict', [
            'features' => $features
        ]);

        // Get JSON response
        $result = $response->json();

        return view('prediction', [
            'prediction' => $result['prediction'] ?? 'No result'
        ]);
    }

    public function showPredictions() {
    $imageDir = public_path('prediction_images');
    $images = array_diff(scandir($imageDir), array('.', '..')); // get all files
    return view('predictions', compact('images'));
}

}
