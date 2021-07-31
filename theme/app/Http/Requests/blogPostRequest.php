<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\HomeController;

use App\Models\Blog;


class blogPostRequest extends FormRequest
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
           
            'ck.*.*' => ['Required'],
            'option.*.*' => ['bail', 'required_without:checkbox.*.*'],
            'checkbox.*.*' => ['bail', 'required_without:option.*.*'],


        ];
        

    }
}
