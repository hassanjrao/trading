<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Firm extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $appends = ['logo_url'];

    public function getLogoUrlAttribute()
    {
        return Storage::url($this->logo_path);
    }

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

    public function about()
    {
        return $this->hasOne(FirmAbout::class, 'firm_id')->withDefault();
    }

    public function paymentMethods()
    {
        return $this->hasMany(FirmPaymentMethod::class);
    }

    public function payoutMethods()
    {
        return $this->hasMany(FirmPayoutMethod::class);
    }

    public function platforms()
    {
        return $this->hasMany(FirmPlatform::class);
    }

    public function commissionStructures()
    {
        return $this->hasMany(FirmCommissionStructure::class);
    }

    public function accountSize()
    {
        return $this->belongsTo(AccountSize::class)->withDefault();
    }

    public function step(){
        return $this->belongsTo(Step::class)->withDefault();
    }

    public function userVotes()
    {
        return $this->belongsToMany(User::class, 'firm_user_vote')->withTimestamps();
    }

    public function firmReviews()
    {
        return $this->hasMany(FirmReview::class);
    }
}
