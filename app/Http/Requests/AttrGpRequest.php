<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AttrGpRequest extends FormRequest
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
        if($this->method() =='patch'){
            return [
                'title' => ['required','max:191',Rule::unique('attributegroups')->ignore(request()->attribute_group)],
                'type'=>'required'
            ];
        }
        return [
            'title' => 'required|unique:attributegroups',
            'type'=>'required'
        ];
    }
}
