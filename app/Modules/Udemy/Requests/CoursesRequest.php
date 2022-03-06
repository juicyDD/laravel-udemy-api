<?php

namespace App\Modules\Udemy\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoursesRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     * @return array
     */
    public function attributes(){
        return [
        ];
    }

    /**
     * custom messages validation
     * @return array
     */
    public function messages(){
        return [
        ];
    }
}
