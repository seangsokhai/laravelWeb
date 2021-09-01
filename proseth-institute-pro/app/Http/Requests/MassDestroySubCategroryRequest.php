<?php

namespace App\Http\Requests;

use App\SubCatrgory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySubCategroryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('subCategory_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:subCategory,id',
        ];
    }
}
