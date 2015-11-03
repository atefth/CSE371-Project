<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Interval;
use Validator;

class IntervalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($offset, $limit)
    {
        $intervals = Interval::skip($offset)->limit($limit)->with('courses')->get();
        return json_encode($intervals);
    }

    public function filter(Request $request, $offset, $limit)
    {
        $intervals = Interval::where('start', '>', $request->start)->where('stop', '<', $request->stop)->whereDay($request->day)->skip($offset)->limit($limit)->with('courses')->get();
        return json_encode($intervals);
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
            'start' => 'required',
            'end' => 'required',
            'duration' => 'required',
            'day' => 'required'
            ]);
        if ($validator->fails()) {
            return json_encode($validator->errors());
        }else{
            $interval = new Interval;
            foreach ($request->all() as $key => $value) {
                $interval->$key = $value;
            }
            $interval->save();
            return json_encode($interval);
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
        $interval = Interval::find($id)->with('courses');
        if (!is_null($interval)) {
            return json_encode($interval);
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
        $interval = Interval::find($id);
        if (!is_null($interval)) {
            foreach ($request->all() as $key => $value) {
                $interval->$key = $value;
            }
            $interval->save();
            return json_encode($interval);
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
        $interval = Interval::find($id);
        if (!is_null($interval)) {
            $interval->delete();
            return json_encode(true);
        }else{
            return json_encode(false);
        }
    }

    public function syncCourses(Request $request, $id)
    {
        $interval = Interval::find($id);
        if (!is_null($interval)) {
            $interval->courses()->sync($request->courses);
            return json_encode(true);
        }else{
            return json_encode(false);
        }
    }
}
