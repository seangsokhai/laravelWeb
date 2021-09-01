<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $table = 'instructor';
    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'mail',
        'des',
        'facebook_link',
        'twitter_link',
        'linkin_link',
        'profile'
    ];

    public function instructor()
    {
        return $this->hasMany(Instructor::class);
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
