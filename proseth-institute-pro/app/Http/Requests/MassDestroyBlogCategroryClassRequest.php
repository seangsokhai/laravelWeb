<?php

namespace App\Http\Requests;

use App\BlogCatrgory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBlogCategroryClassRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('blogCategory_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:blogCategory,id',
        ];
    }
}
