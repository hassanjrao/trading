<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Firm extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function firmChallenges()
    {
        return $this->hasMany(FirmChallenge::class);
    }

    public function assetType()
    {
        return $this->belongsTo(AssetType::class)->withDefault();
    }

    public function technology()
    {
        return $this->belongsTo(Technology::class)->withDefault();
    }
}
