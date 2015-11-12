<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use User;
use Student;
use Faculty;
use Admin;
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
        $response = array();
        foreach ($users as $key => $user) {
            switch ($user->role) {
                case 'student':
                $student = Student::find($user->id);
                $user = array_merge($user->toArray(), $student->toArray());
                break;
                case 'faculty':
                $faculty = Faculty::find($user->id);
                $user = array_merge($user->toArray(), $faculty->toArray());
                break;
                case 'admin':
                $admin = Admin::find($user->id);
                $user = array_merge($user->toArray(), $admin->toArray());
                break;
            }
            array_push($response, $user);
        }
        return json_encode($response);
    }

    public function filter($offset, $limit, Request $request)
    {
        $users = User::where('id', '>', $offset)->whereRole($request->role)->limit($limit)->get();
        $response = array();
        foreach ($users as $key => $user) {
            switch ($user->role) {
                case 'student':
                $student = Student::find($user->id);
                $user = array_merge($user->toArray(), $student->toArray());
                break;
                case 'faculty':
                $faculty = Faculty::find($user->id);
                $user = array_merge($user->toArray(), $faculty->toArray());
                break;
                case 'admin':
                $admin = Admin::find($user->id);
                $user = array_merge($user->toArray(), $admin->toArray());
                break;
            }
            array_push($response, $user);
        }
        return json_encode($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator_one = Validator::make($request->user, [
            'f_name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
            ]);
        if (isset($request->user['role'])) {
            $role = $request->user['role'];
        }else{
            $role = 'student';
        }
        switch ($role) {
            case 'student':
            $validator_two = Validator::make($request->student, [
                'student_id' => 'required',
                'major' => 'required'
                ]);
            break;
            case 'faculty':
            $validator_two = Validator::make($request->faculty, [
                'faculty_id' => 'required'
                ]);
            break;
            case 'admin':
            $validator_two = Validator::make($request->admin, [
                'admin_id' => 'required'
                ]);
            break;
        }
        if ($validator_one->fails() || $validator_two->fails()) {
            $errors = array_merge($validator_one->errors()->toArray(), $validator_two->errors()->toArray());
            return json_encode($errors);
        }else{
            $user = new User;
            foreach ($request->user as $key => $value) {
                if ($key == 'password') {
                    $user->$key = bcrypt($value);
                }elseif($key == 'password_confirmation'){

                }else{
                    $user->$key = $value;
                }
            }
            $user->save();
            $user = User::find($user->id);
            $response = array();
            switch ($role) {
                case 'student':
                $student = new Student;
                $student->id = $user->id;
                foreach ($request->student as $key => $value) {
                    $student->$key = $value;
                }
                $student->save();
                break;
                case 'faculty':
                $faculty = new Faculty;
                $faculty->id = $user->id;
                foreach ($request->faculty as $key => $value) {
                    $faculty->$key = $value;
                }
                $faculty->save();
                break;
                case 'admin':
                $admin = new Admin;
                $admin->id = $user->id;
                foreach ($request->admin as $key => $value) {
                    $admin->$key = $value;
                }
                $admin->save();
                break;
            }
            $response = $user->toArray();
            return json_encode($response);
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
            switch ($user->role) {
                case 'student':
                $student = Student::find($user->id);
                $user = array_merge($user->toArray(), $student->toArray());
                break;
                case 'faculty':
                $faculty = Faculty::find($user->id);
                $user = array_merge($user->toArray(), $faculty->toArray());
                break;
                case 'admin':
                $admin = Admin::find($user->id);
                $user = array_merge($user->toArray(), $admin->toArray());
                break;
            }
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
