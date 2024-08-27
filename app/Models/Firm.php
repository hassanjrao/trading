<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Firm extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $appends = ['logo_url','established_date_formatted'];

    public function getEstablishedDateFormattedAttribute()
    {
        return Carbon::parse($this->established_date)->format('M Y');
    }

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

    public function country()
    {
        return $this->belongsTo(Country::class)->withDefault();
    }

    public function paymentMethods()
    {
        return $this->belongsToMany(PaymentMethod::class, 'firm_payment_method');
    }

    public function payoutMethods()
    {
        return $this->belongsToMany(PayoutMethod::class, 'firm_payout_method');
    }

    public function platforms()
    {
        return $this->belongsToMany(Platform::class, 'firm_platform');
    }

}
