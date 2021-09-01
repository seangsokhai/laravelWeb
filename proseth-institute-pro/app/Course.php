<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'course';
    protected $fillable = [
        'title',
        'subCategory_id',
        'course_over_view',
        'course_audience',
        'course_outline',
        'course_completion',
        'course_prerequisites',
        'image'
    ];

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'subCategory_id');
    }

    public function schedule()
    {
        return $this->hasMany(Schedule::class, 'course_id');
    }

    public function student()
    {
        return $this->hasMany(Student::class, 'course_id');
    }

    public function subscrib_query()
    {
        return $this->hasMany(SubscribQuery::class, 'course_id');
    }
}
