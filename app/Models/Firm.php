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


    public function calculateAverageRatings(){

        $ratings=$this->firmReviews();

        $totalRatings=$ratings->count();

        if($totalRatings==0){
            return [
                'dashboard'=>0,
                'support_team'=>0,
                'payout_process'=>0,
                'rules'=>0,
                'general'=>0,
                'overall'=>0,
                'five_stars_avg'=>0,
                'four_stars_avg'=>0,
                'three_stars_avg'=>0,
                'two_stars_avg'=>0,
                'one_star_avg'=>0,
                'five_stars'=>0,
                'four_stars'=>0,
                'three_stars'=>0,
                'two_stars'=>0,
                'one_star'=>0,
            ];
        }

        $totalRating=5;

        $ratingDashboard=$ratings->sum('rating_dashboard');
        $ratingSupportTeam=$ratings->sum('rating_support_team');
        $ratingPayoutProcess=$ratings->sum('rating_payout_process');
        $ratingRules=$ratings->sum('rating_rules');
        $ratingGeneral=$ratings->sum('rating_general');

        $avgRatingDashboard=$ratingDashboard/$totalRatings;
        $avgRatingSupportTeam=$ratingSupportTeam/$totalRatings;
        $avgRatingPayoutProcess=$ratingPayoutProcess/$totalRatings;
        $avgRatingRules=$ratingRules/$totalRatings;
        $avgRatingGeneral=$ratingGeneral/$totalRatings;

        $avgOverallRating=($avgRatingDashboard+$avgRatingSupportTeam+$avgRatingPayoutProcess+$avgRatingRules+$avgRatingGeneral)/$totalRating;

        $fiveStarsRatingCount=0;
        $fourStarsRatingCount=0;
        $threeStarsRatingCount=0;
        $twoStarsRatingCount=0;
        $oneStarRatingCount=0;

        foreach($ratings->get() as $rating){
                if($rating->rating_dashboard==5 || $rating->rating_support_team==5 || $rating->rating_payout_process==5 || $rating->rating_rules==5 || $rating->rating_general==5){
                $fiveStarsRatingCount++;
            }
            if($rating->rating_dashboard==4 || $rating->rating_support_team==4 || $rating->rating_payout_process==4 || $rating->rating_rules==4 || $rating->rating_general==4){
                $fourStarsRatingCount++;
            }
            if($rating->rating_dashboard==3 || $rating->rating_support_team==3 || $rating->rating_payout_process==3 || $rating->rating_rules==3 || $rating->rating_general==3){
                $threeStarsRatingCount++;
            }
            if($rating->rating_dashboard==2 || $rating->rating_support_team==2 || $rating->rating_payout_process==2 || $rating->rating_rules==2 || $rating->rating_general==2){
                $twoStarsRatingCount++;
            }
            if($rating->rating_dashboard==1 || $rating->rating_support_team==1 || $rating->rating_payout_process==1 || $rating->rating_rules==1 || $rating->rating_general==1){
                $oneStarRatingCount++;
            }
        }


        return [
            'dashboard'=>round($avgRatingDashboard,1),
            'support_team'=>round($avgRatingSupportTeam,1),
            'payout_process'=>round($avgRatingPayoutProcess,1),
            'rules'=>round($avgRatingRules,1),
            'general'=>round($avgRatingGeneral,1),
            'overall'=>round($avgOverallRating,1),
            'five_stars_avg'=>$fiveStarsRatingCount/$totalRatings*100,
            'four_stars_avg'=>$fourStarsRatingCount/$totalRatings*100,
            'three_stars_avg'=>$threeStarsRatingCount/$totalRatings*100,
            'two_stars_avg'=>$twoStarsRatingCount/$totalRatings*100,
            'one_star_avg'=>$oneStarRatingCount/$totalRatings*100,

            'five_stars'=>$fiveStarsRatingCount,
            'four_stars'=>$fourStarsRatingCount,
            'three_stars'=>$threeStarsRatingCount,
            'two_stars'=>$twoStarsRatingCount,
            'one_star'=>$oneStarRatingCount,

        ];



    }

}
