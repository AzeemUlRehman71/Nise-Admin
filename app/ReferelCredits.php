<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReferelCredits extends Model
{
    protected $table = 'referal_credits_status';

    protected $fillable = [
        'credits', 'phone','user_id','refer_id','refer_code'
    ];
}
