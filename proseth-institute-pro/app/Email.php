<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $table = 'email';
    protected $fillable = [
        'full_name',
        'email_address',
        'phone_number',
        'subject',
        'message',
    ];
}
