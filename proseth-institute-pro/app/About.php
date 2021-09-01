<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'about';
    protected $fillable = [
        'over_view',
        'mission',
        'vision',
        'value',
        'csr',
        'link',
        'thumbnail'
    ];
}
