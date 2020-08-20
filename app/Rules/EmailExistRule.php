<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Http\Requests\UserRequest;
use App\User;
class EmailExistRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
//        $data = User::where('delete_flag', 0)->where('email', $value)->count();
//        if($data == 1) return false;
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Email đã tồn tại';
    }
}
