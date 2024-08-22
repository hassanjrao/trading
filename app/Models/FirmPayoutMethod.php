<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class FirmPayoutMethod extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $appends=['image_url'];

    public function getImageUrlAttribute()
    {
        return $this->image_path ? Storage::url($this->image_path) : null;
    }

    public function firm()
    {
        return $this->belongsTo(Firm::class);
    }
}
