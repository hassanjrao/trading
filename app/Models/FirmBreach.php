<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FirmBreach extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function firm()
    {
        return $this->belongsTo(Firm::class);
    }
}
