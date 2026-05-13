<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PodUpload;

class PodController extends Controller
{
    // UPLOAD POD
    public function upload(Request $request)
    {
        $request->validate([
            'assignment_id' => 'required',
            'pod_image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // store image
        $imagePath = $request->file('pod_image')
            ->store('pods', 'public');

        $pod = PodUpload::create([
            'assignment_id' => $request->assignment_id,
            'uploaded_by' => auth()->id(),
            'pod_image' => $imagePath,
            'remarks' => $request->remarks
        ]);

        return response()->json([
            'message' => 'POD uploaded successfully',
            'pod' => $pod
        ]);
    }

    // VIEW PODS
    public function index()
    {
        return response()->json(
            PodUpload::latest()->get()
        );
    }
}