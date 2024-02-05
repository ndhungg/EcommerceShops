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
            'email' => 'required|string|email|unique:users,email,'.$this->id.'|max:191',
            'name' => 'required|string|max:191',
        ];
    }


    public function messages(): array
        {
            return [
                'email.required' => 'Bạn chưa nhập vào Email.',
                'email.email' => 'Email chưa đúng định dạng. Ví dụ: example@gmail.com.',
                'email.unique' => 'Email đã tồn tại. Hãy chọn tên Email khác.',
                'email.string' => 'Email phải là dạng ký tự.',
                'email.max' => 'Độ dài của Email tối đa là 191 ký tự.',

                'name.required' => 'Bạn chưa nhập Họ tên.',
                'name.string' => 'Họ tên phải là dạng ký tự.',
                'name.max' => 'Độ dài của Họ tên tối đa là 191 ký tự.',


            ];
        }
}
