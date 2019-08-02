<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class Destroy extends FormRequest
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
