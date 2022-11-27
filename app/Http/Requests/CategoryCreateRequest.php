<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryCreateRequest extends FormRequest
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
    
    protected function prepareForValidation()
    {
        if($this->input('slug')){
            $this->merge(['slug' => per_slug($this->input('slug'))]);
        }else{
            $this->merge(['slug' => per_slug($this->input('title'))]);
        }
    }

	public function rules()
    {
        return [
            'title'=>['required','min:2'],
			'slug'=>'unique:categories',
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
