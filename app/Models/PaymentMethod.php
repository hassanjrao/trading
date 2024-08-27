<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class PaymentMethod extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $appends = ['logo_url'];

    public function getLogoUrlAttribute()
    {
        return Storage::url($this->logo_path);
    }
}
