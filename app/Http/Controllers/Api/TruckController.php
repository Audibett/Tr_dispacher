<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Truck;

class TruckController extends Controller
{
    // CREATE TRUCK
    public function store(Request $request)
    {
        $request->validate([
            'truck_number' => 'required',
            'truck_type' => 'required',
            'capacity' => 'required'
        ]);

        $truck = Truck::create($request->all());

        return response()->json([
            'message' => 'Truck created successfully',
            'truck' => $truck
        ]);
    }

    // VIEW TRUCKS
    public function index()
    {
        return response()->json(
            Truck::latest()->get()
        );
    }
}