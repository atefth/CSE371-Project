<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use User;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($offset, $limit)
    {
        $users = User::where('id', '>', $offset)->limit($limit)->get();
        return json_encode($users);
    }

    public function filter($offset, $limit, Request $request)
    {
        $users = User::where('id', '>', $offset)->whereRole($request->role)->limit($limit)->get();
        return json_encode($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'f_name' => 'required',
            'student_id' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
            ]);
        if ($validator->fails()) {
            return json_encode($validator->errors());
        }else{
            $user = new User;
            foreach ($request->all() as $key => $value) {
                if ($key == 'password') {
                    $user->$key = bcrypt($value);
                }elseif($key == 'password_confirmation'){

                }else{
                    $user->$key = $value;
                }
            }
            $user->save();
            return json_encode($user);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if (!is_null($user)) {
            return json_encode($user);
        }else{
            return json_encode(false);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!is_null($user)) {
            foreach ($request->all() as $key => $value) {
                if ($key == 'password') {
                    $user->$key = bcrypt($value);
                }elseif($key == 'password_confirmation'){

                }else{
                    $user->$key = $value;
                }
            }
            $user->save();
            return json_encode($user);
        }else{
            return json_encode(false);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (!is_null($user)) {
            $user->delete();
            return json_encode(true);
        }else{
            return json_encode(false);
        }
    }
}
