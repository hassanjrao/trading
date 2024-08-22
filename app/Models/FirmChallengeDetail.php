<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirmChallengeDetail extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function firmChallenge()
    {
        return $this->belongsTo(FirmChallenge::class);
    }
}
