<?php

namespace App\Scopes;


trait EditScope {
    public function scopeEdit($query, $request)
    {

        if (isset($request->role)) {
            $query->update(['role' => $request->role]);
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
