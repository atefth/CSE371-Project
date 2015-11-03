<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use User;
use Auth;

class AuthController extends Controller
{
    public function attempt(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
            ]);
        if ($validator->fails()) {
            return json_encode($validator->errors());
        }else{
            $user = User::whereEmail($request->email)->get();
            if (count($user)) {
                $user = $user[0];
            }else{
                $user = null;
            }
            if (!is_null($user)) {
                if (Auth::attempt(array('email' => $request->email, 'password' => $request->password), $request->remember)) {
                    Auth::login($user, true);
                    return json_encode(Auth::user());
                }else{
                    return json_encode(false);
                }
            }else{
                return json_encode(false);
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        return json_encode(true);
    }

    public function check()
    {
        $user = Auth::user();
        if (!is_null($user)) {
            return json_encode($user);
        }else{
            return json_encode(false);
        }
    }
}
