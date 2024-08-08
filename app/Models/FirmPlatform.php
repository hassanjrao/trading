<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class FirmPlatform extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $appends=['image_url'];

    public function getImageUrlAttribute()
    {
        return Storage::url($this->image_path);
    }

    public function firm()
    {
        return $this->belongsTo(Firm::class);
    }
}
