<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    protected $table = 'agency';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'location', 'status', 'post','previliges',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'nise_id', 'uniqueid');
    }
}
