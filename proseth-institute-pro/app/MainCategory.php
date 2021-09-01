<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    protected $table = 'main_category';
    protected $fillable = [
        'title',
        'des',
        'image'
    ];

    public function subCategory()
    {
        return $this->hasMany(subCategory::class,'mainCategory_id');
    }
}
