<?php

namespace FCLLA\Http\Requests;

use FCLLA\Http\Requests\Request;

class ContactRequest extends Request
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
            'name'=>'required|min:3',
            'member'=>'required',
            'email'=>'required|email',
            'issuetype'=>'required',
            'messagebody'=>'required|min:3'
        ];
    }
}
