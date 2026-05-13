<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Load;

class LoadController extends Controller
{
    // CREATE LOAD
    public function store(Request $request)
    {
        $request->validate([
            'pickup_location' => 'required',
            'delivery_location' => 'required',
            'load_description' => 'required',
            'weight' => 'required'
        ]);

        $load = Load::create([
            'shipper_id' => auth()->id(),
            'pickup_location' => $request->pickup_location,
            'delivery_location' => $request->delivery_location,
            'load_description' => $request->load_description,
            'weight' => $request->weight,
            'status' => 'pending'
        ]);

        return response()->json([
            'message' => 'Load created successfully',
            'load' => $load
        ]);
    }

    // VIEW LOADS
    public function index()
    {
        $loads = Load::with('shipper')->latest()->get();

        return response()->json($loads);
    }

    // APPROVE LOAD
    public function approve($id)
    {
        $load = Load::findOrFail($id);

        $load->status = 'approved';

        $load->save();

        return response()->json([
            'message' => 'Load approved successfully',
            'load' => $load
        ]);
    }
}