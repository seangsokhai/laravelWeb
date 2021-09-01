<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'sub_category';
    protected $fillable = [
        'mainCategory_id',
        'title',
        'des',
        'image'
    ];

    public function mainCategory()
    {
        return $this->belongsTo(mainCategory::class,'mainCategory_id');
    }

    public function course()
    {
        return $this->hasMany(Course::class,'subCategory_id');
    }
}
