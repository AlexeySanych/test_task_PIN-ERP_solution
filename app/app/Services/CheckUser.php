<?php

namespace App\Services;

class CheckUser
{
    public static function isAdmin() {
        if (session()->has('user_mail')) {
            $role = config('products.role');
            $admins = $role['admin'];
            foreach ($admins as $admin) {
                if ($admin == session('user_mail')) {
                    return true;
                }
            }
        }
        return false;
    }
}
