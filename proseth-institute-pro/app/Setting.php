<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'setting';
    protected $fillable = [
        'logo',
        'facebook_link',
        'youtube_link',
        'twitter_link',
        'linkin_link',
        'phone_number',
        'mail',
        'footer_text',
        'map',
        'address',
        'open_daily'
    ];
}
