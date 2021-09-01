<?php

namespace App\Http\Requests;

use App\Email;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyEmailRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('subscrib_query_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:subscrib_query,id',
        ];
    }
}
