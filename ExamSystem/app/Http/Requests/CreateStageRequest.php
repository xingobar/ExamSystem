<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class CreateStageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];
        $count = 0;
        foreach($this->request->input('data') as $data)
        {
            foreach ($data as $key => $value)
            {
                $rules[$count.$key] ='required';
            }
            $count +=1;
        }
        return $rules;
    }
}
