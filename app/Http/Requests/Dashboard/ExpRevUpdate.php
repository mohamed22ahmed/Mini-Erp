<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class ExpRevUpdate extends FormRequest
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
            'in_id'=>'required',
            'branch_id'=>'required',
            'admin_id'=>'required',
            'operation_date'=>'required|date',
            'type'=>'required',
            'value'=>'required|numeric',
        ];
    }
}
