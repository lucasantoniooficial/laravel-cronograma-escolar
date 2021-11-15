<?php

namespace App\Http\Requests\Team;

use Illuminate\Foundation\Http\FormRequest;

class RequestUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check() && auth()->user()->hasRole('Admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => 'required|unique:teams,code,'.$this->team->id,
            'name' => 'required',
            'start' => 'required',
            'hours' => 'required',
            'color' => 'required'
        ];
    }
}
