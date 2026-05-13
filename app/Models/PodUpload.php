<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PodUpload extends Model
{
    use HasFactory;

    protected $fillable = [
        'assignment_id',
        'uploaded_by',
        'pod_image',
        'remarks'
    ];

    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }

    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }
}