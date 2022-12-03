<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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

    protected function prepareForValidation(){
        
        if($this->input('slug')){
            $this->merge(['slug' => per_slug($this->input('slug'))]);
        }else{
            $this->merge(['slug' => per_slug($this->input('title'))]);
        }

        if($this->input('extra')){

            $extra_array = array_filter($this->input('extra'), function ($row) {
                if ($row['title'] != null && $row['title']!='') {
                    return true;
                }
            });
            $extra_array = array_values($extra_array);
            $this->merge(['extra' => $extra_array]);
        }

    }


    public function rules()
    {
        return [
            //
        ];
    }
}
