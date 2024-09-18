<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'country',
        'country_flag',
        'trading_experience_id',
        'prop_firm_challenge_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    protected $appends=['profile_picture_url','country_flag_url'];

    public function getProfilePictureUrlAttribute()
    {
       if(!$this->profile_picture){
           return asset('front-assets/images/65b97f82aa9d0b5ea0de494c_profile-image 1.png');
       }

       return Storage::url($this->profile_picture);
    }

    public function getCountryFlagUrlAttribute()
    {
        if(!$this->country_flag){
            return asset('countries/ae.png');
        }

        return Storage::url($this->country_flag);
    }





    public function firmVote()
    {
        return $this->hasOne(FirmUserVote::class, 'user_id');
    }

    public function firmReviews()
    {
        return $this->hasMany(FirmReview::class);
    }


}
