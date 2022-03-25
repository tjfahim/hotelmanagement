<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\RoomType;
class RoomTypeController extends Controller
{
    public function index()
    {
        $data=RoomType::all();
        return view('roomtype.index',['data'=>$data]);
    }

    public function create()
    {
        return view('roomtype.create');
    }
    public function store(Request $request)
    {
        $data= new RoomType;
        $data->title=$request->title;
        $data->price=$request->price;
        $data->detail=$request->detail;
        $data->save();
        return redirect('admin/roomtype/create')->with('success','data has been added.');
    }

    public function show($id)
    {
        $data=RoomType::find($id);
        return view('roomtype.show',['data'=>$data]);
    }
    public function edit($id)
    {

        $data=RoomType::find($id);
        return view('roomtype.edit',['data'=>$data]);
    }

    public function update(Request $request, $id)
    {
        $data=RoomType::find($id);
        $data->title=$request->title;
        $data->price=$request->price;
        $data->detail=$request->detail;
        $data->save();
        return redirect('admin/roomtype/'.$id.'/edit')->with('success','data has been updated.');
    }

    public function destroy($id)
    {
        RoomType::where('id',$id)->delete();
        return redirect('admin/roomtype/')->with('success','Data has been deleted.');

    }
}
