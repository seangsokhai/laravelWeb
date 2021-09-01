<?php

namespace App\Http\Requests;

use App\Email;
use App\Rules\LessonTimeAvailabilityRule;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreEmailRequest extends FormRequest
{
    // public function authorize()
    // {
    //     abort_if(Gate::denies('student_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     return true;
    // }

    public function rules()
    {
        return [
            'full_name' => ['required'],
            'email_address' => ['required'],
            'phone_number' => ['required'],
            'subject' => ['required'],
            'message' => ['required'],
        ];
    }
}
