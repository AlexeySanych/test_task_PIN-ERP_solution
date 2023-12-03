<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Http\Request;

class setUserSession
{
    public static function handle(Request $request) {
        $authorizationHeader = $request->header('Authorization');
        $decodedHeader = base64_decode(str_replace('Basic ', '', $authorizationHeader));
        [$user_mail, $password] = explode(':', $decodedHeader);
        $username =  User::where('email', $user_mail)->value('name');
        session(['user_mail' => $user_mail]);
        session(['username' => $username]);
    }
}
