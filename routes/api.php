<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\LoadController;
use App\Http\Controllers\Api\TruckController;
use App\Http\Controllers\Api\AssignmentController;
use App\Http\Controllers\Api\TrackingController;
use App\Http\Controllers\Api\PodController;
use Illuminate\Support\Facades\Route;

// AUTH ROUTES
Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);

});

// ADMIN ROUTES
Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {

    Route::get('/admin-dashboard', function () {

        return response()->json([
            'message' => 'Welcome Admin'
        ]);

    });

    // APPROVE LOADS
    Route::put('/loads/{id}/approve', [
        LoadController::class,
        'approve'
    ]);

    // TRUCKS
    Route::post('/trucks', [TruckController::class, 'store']);

    Route::get('/trucks', [TruckController::class, 'index']);

    // ASSIGN LOAD
    Route::post('/assign-load', [
        AssignmentController::class,
        'assign'
    ]);

});

// SHIPPER ROUTES
Route::middleware(['auth:sanctum', 'role:shipper'])->group(function () {

    Route::post('/loads', [LoadController::class, 'store']);

});

// GENERAL AUTHENTICATED ROUTES
Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/loads', [LoadController::class, 'index']);

});

// DRIVER ROUTES
Route::middleware(['auth:sanctum', 'role:driver'])->group(function () {

    Route::get('/driver/assignments', [
        AssignmentController::class,
        'driverAssignments'
    ]);

    // UPDATE TRACKING STATUS
    Route::post('/tracking/update', [
        TrackingController::class,
        'updateStatus'
    ]);

});

// TRACKING HISTORY
Route::middleware('auth:sanctum')->group(function () {

    Route::get('/tracking/{assignment_id}', [
        TrackingController::class,
        'trackingHistory'
    ]);

});

Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('/pod/upload', [
        PodController::class,
        'upload'
    ]);

    Route::get('/pods', [
        PodController::class,
        'index'
    ]);

});