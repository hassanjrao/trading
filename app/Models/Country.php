<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Country extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];


    protected $appends=['flag_url'];

    public function getFlagUrlAttribute()
    {
        if(!$this->flag){
            return asset('countries/ae.png');
        }

        return Storage::url($this->flag);
    }

}
