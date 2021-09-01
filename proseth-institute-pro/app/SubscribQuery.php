<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscribQuery extends Model
{
    protected $table = 'subscrib_query';
    protected $fillable = [
        'first_name',
        'last_name',
        'course_id',
        'schedule_id',
        'phone_number',
        'email',
        'gender',
        'message',
    ];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'schedule_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
