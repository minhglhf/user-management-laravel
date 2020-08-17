<?php

namespace App\Scopes;

trait SearchScope
{
    public function scopeSearch($query, $request)
    {
        if ($request->has('role')) {
            $query->where('role', 'LIKE', '%' . $request->role . '%');
        }

        if ($request->has('email')) {
            $query->where('email', 'LIKE', '%' . $request->email . '%');
        }

        if ($request->has('address')) {
            $query->where('address', 'LIKE', '%' . $request->address . '%');
        }

        if ($request->has('name')) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }

        if ($request->has('sex')) {
            $query->where('sex', 'LIKE', '%' . $request->sex . '%');
        }

        if ($request->has('birth')) {
            $query->where('birth', 'LIKE', '%' . $request->birth . '%');
        }

        return $query;
    }



}
