<?php
use App\Models\User;

if (!function_exists('permission_list')) {
    function permission_list()
    {

        $permission_list = \App\Models\AccessControl::where("role_id", Auth::user()->role_id)
            ->pluck('permission')->toArray();
        return $permission_list;
    }
}