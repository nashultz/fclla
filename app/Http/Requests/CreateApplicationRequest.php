<?php

namespace FCLLA\Http\Requests;

use FCLLA\Http\Requests\Request;

class CreateApplicationRequest extends Request
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
            'bname'=>'required',
            'name'=>'required',
            'address'=>'required',
            'city'=>'required',
            'state'=>'required',
            'zipcode'=>'required',
            'bphone'=>'required',
            'hphone'=>'required',
            'cphone'=>'required',
            'email'=>'required',
            'units'=>'required',
            'membership'=>'required',
            'roster'=>'required',
        ];
    }
}
