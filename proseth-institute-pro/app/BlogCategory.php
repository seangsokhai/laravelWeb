<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $table = 'blogcategory';
    protected $fillable = [
        'title'
    ];


    public function blog()
    {
        return $this->hasMany(Blog::class,'blogCategory_id');
    }
}
