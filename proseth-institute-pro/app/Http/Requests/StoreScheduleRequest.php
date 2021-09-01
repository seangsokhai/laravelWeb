<?php

namespace App\Http\Requests;

use App\Schedule                                                                                                ;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreScheduleRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('schedule_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'code' => ['required','unique:schedule'],
            'instructor_id' => ['required'],
            'course_id' => ['required'],
            'duration' => ['required'],
            // 'course_fee' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
        ];
    }
}
