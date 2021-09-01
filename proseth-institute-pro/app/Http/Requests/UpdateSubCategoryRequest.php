<?php

namespace App\Http\Requests;

use App\SubCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateSubCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('subCategory_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return true;
    }

    public function rules()
    {
        return [
            'mainCategory_id' => ['required'],
            'title' => ['required'],
            'des' => ['required'],
        ];
    }
}
