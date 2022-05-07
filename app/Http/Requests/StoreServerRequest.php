<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServerRequest extends FormRequest
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
//        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
//        return [
//            "serverName"=> "'required|max:3|min:50",
//            "serverUrl"=>  'required|url|regex:'.$regex,
//            "serverIcon" => "nullable",
//            "serverIcon.*" => "file|max:3000|mimes:jpg,png"
//        ];
    }
}
