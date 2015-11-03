<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use User;
use Validator;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($offset, $limit)
    {
        $grades = Grade::where('id', '>', $offset)->limit($limit)->paginate();
        return json_encode($grades);
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
            'gpa' => 'required',
            'course_id' => 'required',
            'semester_id' => 'required',
            'student_id' => 'required',
            'faculty_id' => 'required',
            'section' => 'required',
            'credits' => 'required'
            ]);
        if ($validator->fails()) {
            return json_encode($validator->errors());
        }else{
            $grade = new Grade;
            foreach ($request->all() as $key => $value) {
                $grade->$key = $value;
            }
            $grade->save();
            return json_encode($grade);
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
        $grade = Grade::find($id);
        if (!is_null($grade)) {
            return json_encode($grade);
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
        $grade = Grade::find($id);
        if (!is_null($grade)) {
            foreach ($request->all() as $key => $value) {
                $grade->$key = $value;
            }
            $grade->save();
            return json_encode($grade);
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
        $grade = Grade::find($id);
        if (!is_null($grade)) {
            $grade->delete();
            return json_encode(true);
        }else{
            return json_encode(false);
        }
    }
}
