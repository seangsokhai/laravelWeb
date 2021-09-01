<?php

namespace App\Http\Requests;

use App\BlogCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreBlogCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('blogCategory_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'title' => ['required'],
        ];
    }
}
