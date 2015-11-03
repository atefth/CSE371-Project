<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Semester;
use Validator;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($offset, $limit)
    {
        $semesters = Semester::where('id', '>', $offset)->limit($limit)->get();
        return json_encode($semesters);
    }

    public function filter($offset, $limit, Request $request)
    {
        if (!is_null($request->name) && !is_null($request->division) && !is_null($request->year)) {
            $semesters = Semester::where('id', '>', $offset)->whereName($request->name)->whereDivison($request->division)->whereYear($request->year)->limit($limit)->get();
        }elseif (!is_null($request->name) && !is_null($request->division)) {
            $semesters = Semester::where('id', '>', $offset)->whereName($request->name)->whereDivison($request->division)->limit($limit)->get();
        }elseif (!is_null($request->name) && !is_null($request->year)) {
            $semesters = Semester::where('id', '>', $offset)->whereName($request->name)->whereYear($request->year)->limit($limit)->get();
        }elseif (!is_null($request->division) && !is_null($request->year)) {
            $semesters = Semester::where('id', '>', $offset)->whereDivision($request->division)->whereYear($request->year)->limit($limit)->get();
        }elseif (!is_null($request->name)) {
            $semesters = Semester::where('id', '>', $offset)->whereName($request->name)->limit($limit)->get();
        }elseif (!is_null($request->division)) {
            $semesters = Semester::where('id', '>', $offset)->whereDivision($request->division)->limit($limit)->get();
        }elseif (!is_null($request->year)) {
            $semesters = Semester::where('id', '>', $offset)->whereYear($request->year)->limit($limit)->get();
        }
        return json_encode($semesters);
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
            'l_name' => 'required',
            'student_id' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
            'semester' => 'required',
            'department' => 'required',
            'major' => 'required',
            'phone' => 'required'
            ]);
        if ($validator->fails()) {
            return json_encode($validator->errors());
        }else{
            $semester = new Semester;
            foreach ($request->all() as $key => $value) {
                if ($key == 'password') {
                    $semester->$key = bcrypt($value);
                }elseif($key == 'password_confirmation'){

                }else{
                    $semester->$key = $value;
                }
            }
            $semester->save();
            return json_encode($semester);
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
        $semester = Semester::find($id);
        if (!is_null($semester)) {
            return json_encode($semester);
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
        $semester = Semester::find($id);
        if (!is_null($semester)) {
            foreach ($request->all() as $key => $value) {
                if ($key == 'password') {
                    $semester->$key = bcrypt($value);
                }elseif($key == 'password_confirmation'){

                }else{
                    $semester->$key = $value;
                }
            }
            $semester->save();
            return json_encode($semester);
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
        $semester = Semester::find($id);
        if (!is_null($semester)) {
            $semester->delete();
            return json_encode(true);
        }else{
            return json_encode(false);
        }
    }
}
