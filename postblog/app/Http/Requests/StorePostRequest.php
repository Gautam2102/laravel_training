<?php

namespace App\Http\Requests;
use App\Models\Admin;

use Illuminate\Foundation\Http\FormRequest;

use App\Http\Controllers\HomeController;

class StorePostRequest extends FormRequest
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
            //
            'title' => 'required|max:255',
            'body' => 'required',
            'description'=>'required',
            'image' =>'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
