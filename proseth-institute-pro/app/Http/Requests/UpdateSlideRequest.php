<?php

namespace App\Http\Requests;

use App\Slide;
use App\Rules\LessonTimeAvailabilityRule;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateSlideRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('slide_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'page_id' => ['required'],
            'title'   => ['required'],
            'sub_title'   => ['required'],
            'link'   => ['required'],
            'title_button'   => ['required']
        ];
    }
}
