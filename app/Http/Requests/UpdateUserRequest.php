<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'group_id' => 'required|exists:groups,id',
            'first_name'=> 'required|max:100',
            'second_name'=> 'required|max:100',
            'middle_name'=> 'nullable|max:100',
            'birthday'=> 'required|date',

            'address.city'=> 'required|max:100',
            'address.street'=> 'required|max:100',
            'address.number'=> 'required|max_digits:10',
        ];
    }
}
