<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; // Use this to make HTTP requests

class RocketController extends Controller
{
    public function index()
{
    try {
        $response = Http::get('https://api.spacexdata.com/v3/capsules'); // SpaceX API endpoint

        if ($response->successful()) {
            return $response->json();
        } else {
            return response()->json(['error' => 'Failed to fetch data from SpaceX API'], $response->status());
        }
    } catch (\Exception $e) {
        return response()->json(['error' => 'An error occurred while processing your request'], 500);
    }
}

}

