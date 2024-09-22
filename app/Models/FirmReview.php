<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class FirmReview extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $appends=['order_confirmation_url'];

    public function getOrderConfirmationUrlAttribute()
    {
        return $this->order_confirmation_path ? Storage::url($this->order_confirmation_path) : null;
    }

    public function firm()
    {
        return $this->belongsTo(Firm::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function accountSize()
    {
        return $this->belongsTo(AccountSize::class)->withDefault();
    }

    public function step()
    {
        return $this->belongsTo(Step::class)->withDefault();
    }

    public function ratingPercentages(){
        $totalRating=5;

        $ratingDashboardPerc=$this->rating_dashboard/$totalRating*100;
        $ratingSupportTeamPerc=$this->rating_support_team/$totalRating*100;
        $ratingPayoutProcessPerc=$this->rating_payout_process/$totalRating*100;
        $ratingRulesPerc=$this->rating_rules/$totalRating*100;
        $ratingGeneralPerc=$this->rating_general/$totalRating*100;

        // round to 2 decimal places
        return [
            'dashboard'=>round($ratingDashboardPerc,2),
            'support_team'=>round($ratingSupportTeamPerc),
            'payout_process'=>round($ratingPayoutProcessPerc),
            'rules'=>round($ratingRulesPerc),
            'general'=>round($ratingGeneralPerc),
        ];
    }


}
