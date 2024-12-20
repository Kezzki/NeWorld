<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $response = Http::retry(3, 1000)->timeout(30)->get('https://restcountries.com/v3.1/all');
            $countries = $response->json();
        } catch (\Exception $e) {
            $countries = [];
            return view('home', ['popularCountries' => [], 'error' => 'Failed to load countries data.']);
        }
        $popularCountries = collect($countries)->sortByDesc('population')->take(5)->toArray();

        return view('home', ['popularCountries' => $popularCountries, 'error' => null]);
    }
}
