<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table = 'slide';
    protected $fillable = [
        'page_id',
        'title',
        'sub_title',
        'image',
        'link',
        'title_button'
    ];
}
