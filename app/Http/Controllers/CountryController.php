<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        try {
            // Using Laravel's HTTP client with retry and timeout options
            $response = Http::retry(3, 1000)  // Retry up to 3 times with 1-second delay between retries
                ->timeout(60)  // Timeout after 60 seconds
                ->get('https://restcountries.com/v3.1/all');
            
            $countries = $response->json();

            // Filter countries based on search, region, and language if they exist in the request
            if ($request->has('search')) {
                $countries = array_filter($countries, function($country) use ($request) {
                    return stripos($country['name']['common'], $request->search) !== false;
                });
            }

            if ($request->has('region')) {
                $countries = array_filter($countries, function($country) use ($request) {
                    return stripos($country['region'], $request->region) !== false;
                });
            }

            if ($request->has('language')) {
                $countries = array_filter($countries, function($country) use ($request) {
                    return in_array($request->language, $country['languages'] ?? []);
                });
            }

            return view('countries.index', compact('countries'));
        } catch (\Exception $e) {
            // Handle any errors such as failed requests
            return view('error', ['error' => 'Failed to load countries data: ' . $e->getMessage()]);
        }
    }

    public function show($name)
    {
        try {
            // Using Laravel's HTTP client with retry and timeout options for individual country request
            $response = Http::retry(3, 1000)
                ->timeout(60)
                ->get("https://restcountries.com/v3.1/name/{$name}");
            
            $country = $response->json()[0]; // Assuming that the API always returns a single country

            return view('countries.show', compact('country'));
        } catch (\Exception $e) {
            // Handle errors for the show request
            return view('error', ['error' => 'Failed to load country details: ' . $e->getMessage()]);
        }
    }
}

