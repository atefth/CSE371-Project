<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Course;
use Validator;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($offset, $limit)
    {
        if ($limit == 0) {
            $courses = Course::where('id', '>', $offset)->get();
        }else{
            $courses = Course::where('id', '>', $offset)->limit($limit)->get();
        }
        return json_encode($courses);
    }

    public function filter($offset, $limit, Request $request)
    {
        $courses = Course::where('id', '>', $offset)->whereDepartment($request->department)->limit($limit)->get();
        return json_encode($courses);
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
            'name' => 'required',
            'code' => 'required',
            'credits' => 'required'
            ]);
        if ($validator->fails()) {
            return json_encode($validator->errors());
        }else{
            $course = new Course;
            foreach ($request->all() as $key => $value) {
                $course->$key = $value;
            }
            $course->save();
            return json_encode($course);
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
        $course = Course::find($id);
        if (!is_null($course)) {
            return json_encode($course);
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
        $course = Course::find($id);
        if (!is_null($course)) {
            foreach ($request->all() as $key => $value) {
                $course->$key = $value;
            }
            $course->save();
            return json_encode($course);
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
        $course = Course::find($id);
        if (!is_null($course)) {
            $course->delete();
            return json_encode(true);
        }else{
            return json_encode(false);
        }
    }
}
