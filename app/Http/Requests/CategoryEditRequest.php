<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryEditRequest extends FormRequest
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
        // dd(request()->category);
        return [
            'title'=>['required','min:2'],
			'slug'=>Rule::unique('categories')->ignore(request()->category),
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'لطفا یک عنوان برای محصول وارد نمایید..',
            'slug.unique' => 'آدرس مطلب تکراری است',		  
        ];
    }

}
