<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
           'name' => 'required|max:255',
           'description' => 'required|max:255',
        ];
    }
    public function massege()
    {
        return[
            'name.required' => 'Không được bỏ trông',
            'description.required' => 'Không được bỏ trống',
            'name.required' => 'Không được quá 255 ký tự',
            'description.required' => 'Không được quá 255 ký tự'',
     
        ];  
    }
}
