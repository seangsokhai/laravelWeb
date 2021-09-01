<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogTag extends Model
{
    protected $table = 'blogtag';
    protected $fillable = [
        'title'
    ];

    public function blog()
    {
        return $this->belongsToMany(Blog::class,'blog_blogtag','blog_id','blogTag_id');
    }

}
