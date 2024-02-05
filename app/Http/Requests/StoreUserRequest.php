<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'email' => 'required|string|email|unique:users|max:191',
            'name' => 'required|string|max:191',
            'user_catalogue_id' => 'gt:0',
            'password' => 'required|string|min:6',
            're_password' => 'required|string|same:password',
            'birthday' => 'required|string|date|before:' . now()->subYears(18)->format('Y-m-d'),
            // 'phone' => 'string',
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

                'user_catalogue_id.gt' => 'Bạn chưa chọn nhóm thành viên.',

                'password.required' => 'Bạn chưa nhập vào ô Mật khẩu.',
                'password.min' => 'Độ dài của Email tối thiểu là 6 ký tự.',

                're_password.required' => 'Bạn chưa nhập vào ô Nhập lại mật khẩu.',
                're_password.same' => 'Mật khẩu không khớp.',

                'birthday.required' => 'Bạn chưa nhập Ngày Sinh.',
                'birthday.string' => 'Ngày sinh không hợp lệ.',
                'birthday.date' => 'Ngày sinh không hợp lệ.',
                'birthday.before' => 'Bạn phải đủ 18 tuổi để đăng ký.',

                // 'phone.string' => 'Số điện thoại chưa đúng định dạng.Ví dụ: 0123456789.',

            ];
        }
}
