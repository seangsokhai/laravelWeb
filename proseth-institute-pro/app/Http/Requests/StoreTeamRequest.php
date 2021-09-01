<?php

namespace App\Http\Requests;

use App\Team;
use App\Rules\LessonTimeAvailabilityRule;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreTeamRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('team_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'full_name' => ['required'],
            'position'   => ['required'],
            'profile'   => ['required'],
            'facebook_link' => ['required'],
            'twitter_link'   => ['required'],
            'linkin_link'   => ['required'],
        ];
    }
}
