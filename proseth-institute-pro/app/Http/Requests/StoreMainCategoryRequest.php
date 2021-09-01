<?php

namespace App\Http\Requests;

use App\MainCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreMainCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('mainCategory_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'title' => ['required'],
            'des' => ['required'],
            'image' => ['required'],
        ];
    }
}
