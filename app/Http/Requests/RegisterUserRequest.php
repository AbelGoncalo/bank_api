<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
           'name'=>['required','string','min:2','max:200'],
           'email'=>['required','email','unique:users','max:200'],
           'password'=>['required','string','max:200'],
           'phone_number'=>['required','string','min:9','max:9','unique:users'],
        ];
    }

    public function messages()
    {
        return[
            'name.required'=>'campo name obrigatorio',
            'email.required'=>'campo name obrigatorio',
            'email.email'=>'campo name obrigatorio',
            'email.unique'=>'email ja esta ser usado',
            'password.required'=>'campo name obrigatorio',
            'phone_number.required'=>'campo name obrigatorio',
            'phone_number.unique'=>'campo telefone esta ser usado',
        ];
    }
}
