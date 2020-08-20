<?php

namespace App\Scopes;

use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UserRequest;

trait EditScope
{
    public function scopeEdit($query,  $request)
    {

        if (isset($request->role)) {
            $validator = Validator::make($request->role, ['role' => 'required|integer|min:1|max:3'],['role.required' => 'Role là bắt buộc',
            'role.integer' => 'Role phải là integer',
            'role.min' => 'Role chấp nhận: 1 = superAdmin, 2 = Admin, 3 = user',
            'role.max' => 'Role chấp nhận: 1 = superAdmin, 2 = Admin, 3 = user']);

            if ($validator->fails()) {
                return redirect()->route('user.infoUpdate')
                    ->withErrors($validator)->withInput();
            }
            else $query->update(['role' => $request->role]);
        }

        if (isset($request->email)) {
            $query->update(['email' => $request->email]);
        }

        if (isset($request->password)) {
            $query->update(['password' => password_hash($request->password, PASSWORD_BCRYPT)]);
        }

        if (isset($request->address)) {
            $query->update(['address' => $request->address]);
        }

        if (isset($request->name)) {
            $query->update(['name' => $request->name]);
        }

        if (isset($request->sex)) {
            $query->update(['sex' => $request->sex]);
        }

        if (isset($request->birth)) {
            $query->update(['birth' => $request->birth]);
        }

        return $query;
    }
}
