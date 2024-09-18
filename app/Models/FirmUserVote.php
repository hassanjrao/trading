<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirmUserVote extends Model
{
    use HasFactory;

    protected $guarded=[];

    protected $table='firm_user_vote';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function firm()
    {
        return $this->belongsTo(Firm::class);
    }
}
