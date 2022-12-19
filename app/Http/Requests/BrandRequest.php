<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BrandRequest extends FormRequest
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
        if ($this->method() == 'POST') {
            return [
                'name' => 'required|max:200',
                'slug' => 'required|unique:brands|max:200',
                'image' => 'required|max:2000|mimes:jpg,png,jpeg'

            ];
        }

        return [
                'name' => 'required|max:200',
                'slug' => ['required','max:200',Rule::unique('brands')->ignore(request()->brand)],
                'image' => 'max:2000|mimes:jpg,png,jpeg'
        ];

    }
}
