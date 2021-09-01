<?php

namespace App\Http\Requests;

use App\Course;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreCourseRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('course_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'subCategory_id' => ['required'],
            'title' => ['required'],
            'subCategory_id' => ['required'],
            'course_over_view' => ['required'],
            // 'course_audience' => ['required'],
            // 'course_outline' => ['required'],
            // 'course_completion' => ['required'],
            // 'course_prerequisites'=> ['required'],
            'image' => ['required']
        ];
    }
}
