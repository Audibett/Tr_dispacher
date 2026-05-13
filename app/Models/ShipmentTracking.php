<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentTracking extends Model
{
    use HasFactory;

    protected $fillable = [
        'assignment_id',
        'driver_id',
        'current_location',
        'status',
        'remarks'
    ];

    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }

    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id');
    }
}