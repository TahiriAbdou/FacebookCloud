<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateNewPage extends Request
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
            'title'             => 'required|max:100',
            'slug'              => 'required|unique:pages',
            'content'           => 'required',
            'meta_title'        => 'required|max:255',
            'meta_keywords'     => 'required|max:500',
            'meta_description'  => 'required|max:160'
        ];
    }
}
