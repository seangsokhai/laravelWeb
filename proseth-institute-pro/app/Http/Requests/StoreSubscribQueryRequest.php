<?php

namespace App\Http\Requests;

use App\SubscribQuery;
use App\Rules\LessonTimeAvailabilityRule;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreSubscribQueryRequest extends FormRequest
{
    // public function authorize()
    // {
    //     abort_if(Gate::denies('student_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     return true;
    // }

    public function rules()
    {
        return [
            'course_id' => ['required'],
            'schedule_id' => ['required'],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'phone_number' => ['required'],
            'email' => ['required'],
            'gender' => ['required'],
            'message' => ['required'],
        ];
    }
}
