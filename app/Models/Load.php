<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Load extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipper_id',
        'pickup_location',
        'delivery_location',
        'load_description',
        'weight',
        'status'
    ];

    public function shipper()
    {
        return $this->belongsTo(User::class, 'shipper_id');
    }
}