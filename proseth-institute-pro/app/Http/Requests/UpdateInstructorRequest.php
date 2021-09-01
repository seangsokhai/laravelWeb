<?php

namespace App\Http\Requests;

use App\Instructor;
use App\Rules\LessonTimeAvailabilityRule;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateInstructorRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('instructor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'first_name' => ['required'],
            'last_name' => ['required'],
            // 'phone_number' => ['required'],
            // 'mail' => ['required'],
            'des' => ['required'],
            'facebook_link' => ['required'],
            'twitter_link' => ['required'],
            'linkin_link' => ['required'],
        ];
    }
}
