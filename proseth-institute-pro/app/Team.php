<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'Team';
    protected $fillable = [
        'full_name',
        'position',
        'profile',
        'facebook_link',
        'twitter_link',
        'linkin_link'
    ];
}
