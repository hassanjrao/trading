<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FirmChallenge extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function firm()
    {
        return $this->belongsTo(Firm::class);
    }

    public function accountSize()
    {
        return $this->belongsTo(AccountSize::class)->withDefault();
    }

    public function step()
    {
        return $this->belongsTo(Step::class)->withDefault();
    }

    public function firmChallengeDetails()
    {
        return $this->hasMany(FirmChallengeDetail::class);
    }
}
