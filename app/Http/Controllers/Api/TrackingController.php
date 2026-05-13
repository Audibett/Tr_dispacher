<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipmentTracking;
use App\Models\Assignment;

class TrackingController extends Controller
{
    // DRIVER UPDATE STATUS
    public function updateStatus(Request $request)
    {
        $request->validate([
            'assignment_id' => 'required',
            'current_location' => 'required',
            'status' => 'required'
        ]);

        $tracking = ShipmentTracking::create([
            'assignment_id' => $request->assignment_id,
            'driver_id' => auth()->id(),
            'current_location' => $request->current_location,
            'status' => $request->status,
            'remarks' => $request->remarks
        ]);

        // update assignment status
        $assignment = Assignment::find($request->assignment_id);

        $assignment->status = $request->status;

        $assignment->save();

        return response()->json([
            'message' => 'Tracking updated successfully',
            'tracking' => $tracking
        ]);
    }

    // VIEW TRACKING HISTORY
    public function trackingHistory($assignment_id)
    {
        $tracking = ShipmentTracking::where(
            'assignment_id',
            $assignment_id
        )
        ->latest()
        ->get();

        return response()->json($tracking);
    }
}