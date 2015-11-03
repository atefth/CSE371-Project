<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Room;
use Validator;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($offset, $limit)
    {
        $rooms = Room::where('id', '>', $offset)->limit($limit)->with('courses')->get();
        return json_encode($rooms);
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
            'building' => 'required',
            'floor' => 'required',
            'seats' => 'required'
            ]);
        if ($validator->fails()) {
            return json_encode($validator->errors());
        }else{
            $room = new Room;
            foreach ($request->all() as $key => $value) {
                $room->$key = $value;
            }
            $room->save();
            return json_encode($room);
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
        $room = Room::find($id)->with('courses');
        if (!is_null($room)) {
            return json_encode($room);
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
        $room = Room::find($id);
        if (!is_null($room)) {
            foreach ($request->all() as $key => $value) {
                $room->$key = $value;
            }
            $room->save();
            return json_encode($room);
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
        $room = Room::find($id);
        if (!is_null($room)) {
            $room->delete();
            return json_encode(true);
        }else{
            return json_encode(false);
        }
    }

    public function syncCourses(Request $request, $id)
    {
        $room = Room::find($id);
        if (!is_null($room)) {
            $room->courses()->sync($request->courses);
            return json_encode(true);
        }else{
            return json_encode(false);
        }
    }
}
