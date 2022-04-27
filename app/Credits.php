<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credits extends Model
{

    protected $fillable = [
        'credits', 'phone','user_id'
    ];
    

}
