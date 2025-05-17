<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Transport;
use Illuminate\Http\Request;

class CountryLocationController extends Controller
{
    public function getLocations($countryId, Request $request)
    {
        $country = Country::findOrFail($countryId);
        $query = $country->locations();
        
        if ($request->has('transport_id')) {
            $transport = Transport::with('transportType')->findOrFail($request->transport_id);
            $query->where('type_id', $transport->transportType->id);
        }
        
        $locations = $query->get();
        return response()->json($locations);
    }
} 