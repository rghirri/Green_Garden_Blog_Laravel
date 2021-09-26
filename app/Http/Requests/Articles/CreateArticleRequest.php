<?php

namespace App\Http\Requests\Articles;

use Illuminate\Foundation\Http\FormRequest;

class CreateArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'          => 'required|unique:articles',
            'content'        => 'required',
            'image_list'     => 'required|mimes:jpeg,png,jpg,gif|max:2048|dimensions:max-width=363,min-height=250',
            'image_banner'   => 'required|mimes:jpeg,png,jpg,gif|max:2048|dimensions:max-width=1300,min-height=260',
            'category'       => 'required'    
        ];
    }
}