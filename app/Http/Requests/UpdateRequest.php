<?php

namespace App\Http\Requests;

use App\Rules\EmailExistRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
    public  function rules()
    {

        return [
            'role' => [
                'sometimes', 'nullable','integer','min:1','max:3',
            ],
            'email' => [
                'sometimes','nullable','email',
                new EmailExistRule()
            ] ,
            'password' => 'sometimes|nullable|min:8',
            'sex' => 'nullable|integer|min:0|max:1',
            'name' => 'nullable|regex:/^[a-zA-Z ]*$/',
            'birth' => 'nullable|date|date_format:Y-m-d',
        ];
    }

    public  function messages()
    {
        return [
            'role.required' => 'Role là bắt buộc',
            'role.integer' => 'Role phải là integer',
            'role.min' => 'Role chấp nhận: 1 = superAdmin, 2 = Admin, 3 = user',
            'role.max' => 'Role chấp nhận: 1 = superAdmin, 2 = Admin, 3 = user',
            'email.required' => 'Email là  bắt buộc',
            'email.email' => 'Email phải đúng định dạng',
            'password.required' => 'Mật khẩu là  bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
            'sex.integer' => 'giới tính phải là integer',
            'sex.min' => 'giới tính chấp nhận: 0 = Male, 1 = Female',
            'sex.max' => 'giới tính chấp nhận: 0 = Male, 1 = Female',
            'name' => 'tên chỉ chấp nhận kí tự và khoảng trắng',
            'birth' => 'không đúng định dạng YYYY-MM-DD',
        ];

    }
}
