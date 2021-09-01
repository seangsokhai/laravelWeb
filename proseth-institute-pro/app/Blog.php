<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';
    protected $fillable = [
        'blogCategory_id',
        'user_id',
        'title',
        'description',
        'image',
    ];

    public function blogCategory()
    {
        return $this->belongsTo(BlogCategory::class,'blogCategory_id');
    }

    public function blogTag()
    {
        return $this->belongsToMany(BlogTag::class,'blog_blogtag','blog_id','blogTag_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
