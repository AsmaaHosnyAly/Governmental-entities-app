<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployees extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
            return [
                // 'Email' => 'required|unique:employees,Email,'.$this->id,
                'Password' => 'required',
                'Name' => 'required',
                'Specialization_id' => 'required',
                'Gender_id' => 'required',
                // 'Joining_Date' => 'required|date|date_format:Y-m-d',
                'Address' => 'required',
        
        ];
    }

    public function messages()
    {
        return [
            'Email.required' => 'هذا الحقل مطلوب',
            'Email.unique' => 'هذا الحقل موجود سابقا',
            'Password.required' => 'هذا الحقل مطلوب',
            'Name.required'=>'هذا الحقل مطلوب',
            'Specialization_id.required' => 'هذا الحقل مطلوب',
            'Gender_id.required' =>'هذا الحقل مطلوب',
            'Joining_Date.required' => 'هذا الحقل مطلوب',
            'Address.required' => 'هذا الحقل مطلوب',
        ];
    }
}
