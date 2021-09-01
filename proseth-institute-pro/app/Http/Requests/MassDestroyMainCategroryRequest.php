<?php

namespace App\Http\Requests;

use App\MainCatrgory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMainCategroryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('mainCategory_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:mainCategory,id',
        ];
    }
}
