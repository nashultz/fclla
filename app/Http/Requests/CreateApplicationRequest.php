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
            'bphone'=>'required_without_all:hphone,cphone',
            'hphone'=>'required_without_all:bphone,cphone',
            'cphone'=>'required_without_all:bphone,hphone',
            'email'=>'required|unique:users|unique:applications',
            'units'=>'required',
            'membership'=>'required',
            'roster'=>'required',
        ];
    }
}
