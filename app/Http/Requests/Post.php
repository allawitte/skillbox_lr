<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class Post extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->request->get('id');
        return [
            'title' =>  $id ? 'required|min:2|max:50|unique:posts,slug,'.$id : 'required|min:2|max:50|unique:posts',
            //'title' => 'required|min:2|max:50|unique:posts',
            'content' => 'required',
            'description' => 'string|max:200'
        ];
    }
}
