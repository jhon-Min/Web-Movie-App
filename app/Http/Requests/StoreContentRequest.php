<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContentRequest extends FormRequest
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
           "name"=>"required|unique:contents,name",
            "director"=>"required|min:3|max:30",
            "description"=>"required|min:10|max:200",
            "poster"=>"required|mimes:jpg,jpeg,png|max:5000",
            "trailer"=>"nullable",
            "status"=>"required",
            "releasedate"=>"required",
            "movietype"=>"required|min:3|max:50",
            "casts"=>"required|min:3,max:50"
        ];
    }
}
