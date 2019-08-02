<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
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
            'id' => ['required', 'integer', 'exists:products'],
            'name' => ['nullable', 'string'],
            'type_id' => ['nullable', 'integer', 'exists:types,id'],
            'visible' => ['nullable', 'boolean'],
        ];
    }

    public function withValidator($validator){
        $validator->after(function ($validator){
            if($validator->errors()->any()){
                //dd($validator->errors()->first());
                //$validator->errors()->add('test', 'test error');
            }
        });
    }
}
