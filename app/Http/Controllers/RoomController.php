<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomType;

class RoomController extends Controller
{
    public function index()
    {
        $data=Room::all();
        return view('room.index',['data'=>$data]);
    }

    public function create()
    {
        $roomtypes=RoomType::all();
        return view('room.create',['roomtypes'=>$roomtypes]);
    }
    public function store(Request $request)
    {
        $data= new Room;
        $data->room_type_id=$request->rt_id;
        $data->title=$request->title;
        $data->save();
        return redirect('admin/rooms/create')->with('success','data has been added.');
    }

    public function show($id)
    {
        $data=Room::find($id);
        return view('room.show',['data'=>$data]);
    }
    public function edit($id)
    {
        $roomtypes=RoomType::all();
        $data=Room::find($id);
        return view('room.edit',['data'=>$data,'roomtypes'=>$roomtypes]);
    }

    public function update(Request $request, $id)
    {
        $data=Room::find($id);
        $data->room_type_id=$request->rt_id;
        $data->title=$request->title;
        $data->save();
        return redirect('admin/rooms/'.$id.'/edit')->with('success','data has been updated.');
    }

    public function destroy($id)
    {
        Room::where('id',$id)->delete();
        return redirect('admin/rooms/')->with('success','Data has been deleted.');

    }
}
