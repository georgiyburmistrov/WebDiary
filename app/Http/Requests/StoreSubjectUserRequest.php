<?php

namespace App\Http\Requests;

use App\Rules\IfExists;
use Illuminate\Foundation\Http\FormRequest;

class StoreSubjectUserRequest extends FormRequest
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
            'subject_id'=> ['required', 'numeric', 'exists:subjects,id', new IfExists($this->user)],
            'assessment'=> 'required|numeric|max:5|min:1',
        ];
    }
}
