<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class FirmCommissionStructure extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    // convert json to array
    protected $casts = [
        'points' => 'array'
    ];

    protected $appends=['image_url'];

    public function getImageUrlAttribute()
    {
        return Storage::url($this->image_path);
    }

    public function firm()
    {
        return $this->belongsTo(Firm::class);
    }

    public function commissionStructure()
    {
        return $this->belongsTo(CommissionStructure::class);
    }
}
