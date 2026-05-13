<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\Truck;

class AssignmentController extends Controller
{
    // ASSIGN LOAD
    public function assign(Request $request)
    {
        $request->validate([
            'load_id' => 'required',
            'truck_id' => 'required',
            'driver_id' => 'required'
        ]);

        $assignment = Assignment::create([
            'load_id' => $request->load_id,
            'truck_id' => $request->truck_id,
            'driver_id' => $request->driver_id,
            'status' => 'assigned'
        ]);

        // update truck status
        $truck = Truck::find($request->truck_id);

        $truck->status = 'assigned';

        $truck->save();

        return response()->json([
            'message' => 'Load assigned successfully',
            'assignment' => $assignment
        ]);
    }

    // DRIVER ASSIGNMENTS
    public function driverAssignments()
    {
        $assignments = Assignment::with([
            'load',
            'truck'
        ])
        ->where('driver_id', auth()->id())
        ->get();

        return response()->json($assignments);
    }
}