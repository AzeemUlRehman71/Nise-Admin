<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FbAd extends Model
{
    protected $table = 'fb_ads';
    protected $fillable = ['fb_BannerAd','fb_RewardedAd','fb_InterstitialAd'];
}
