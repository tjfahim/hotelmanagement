<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Carbon\Carbon;

class CustomerController extends Controller
{
    public function index()
    {
        $data=Customer::all();
        return view('customer.index',['data'=>$data]);
    }

    public function create()
    {
        return view('customer.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'full_name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'mobile'=>'required'
        ]);

        // if($request->hash_file()){

        //     $imgPath=$request->file('photo')->store('public/imgs');
        // }
        if ($request->hasFile('photo')) {
            $file_path_info="/img/";
            $file_name = $request->photo->getClientOriginalName();
            $request->photo->move(public_path($file_path_info), $file_name);
            $image_full_name = $file_path_info.$file_name;
        }else{
            $image_full_name = '';

        }


        $data= new Customer;
        $data->full_name=$request->full_name;
        $data->email=$request->email;
        $data->password=sha1($request->password);
        $data->mobile=$request->mobile;
        $data->address=$request->address;
        $data->photo=$image_full_name;
        $data->save();

        return redirect('admin/customer/create')->with('success','data has been added.');
    }

    public function show($id)
    {
        $data=Customer::find($id);
        return view('customer.show',['data'=>$data]);
    }
    public function edit($id)
    {

        $data=Customer::find($id);
        return view('customer.edit',['data'=>$data]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'full_name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'mobile'=>'required'
        ]);

        if($request->hasFile('photo')){
            $imgPath=$request->file('photo')->store('public/imgs');
        }else{
            $imgPath=$request->prev_photo;
        }

        $data= Customer::find($id);
        $data->full_name=$request->full_name;
        $data->email=$request->email;
        $data->password=sha1($request->password);
        $data->mobile=$request->mobile;
        $data->address=$request->address;
        $data->photo=$imgPath;
        $data->save();
        return redirect('admin/customer/'.$id.'/edit')->with('success','data has been updated.');
    }

    public function destroy($id)
    {
        Customer::where('id',$id)->delete();
        return redirect('admin/customer/')->with('success','Data has been deleted.');

    }
}
