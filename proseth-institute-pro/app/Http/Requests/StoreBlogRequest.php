<?php

namespace App\Http\Requests;

use App\Blog;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreBlogRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('blog_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'blogCategory_id' => ['required'],
            'user_id' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
            'image' => ['required'],
        ];
    }
}
