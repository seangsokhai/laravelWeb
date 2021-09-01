<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedule';
    protected $fillable = [
        'code',
        'instructor_id',
        'course_id',
        'duration',
        'course_fee',
        'start_date',
        'end_date',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'instructor_id');
    }

    public function student()
    {
        return $this->hasMany(Student::class, 'schedule_id');
    }

    public function subscrib_query()
    {
        return $this->hasMany(SubscribQuery::class, 'schedule_id');
    }

}
