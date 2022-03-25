@extends('layout')
@section('content')

<!-- Custom styles for this page -->
<link href="{{asset ('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update Customer
                <a href="{{ url('admin/customer')}}" class="float-right btn btn-success btn-sm">View All</a>
            </h6>
        </div>
        <div class="card-body">
            @if (Session::has('success'))
            <p class="text-success">{{session('success')}}</p>
            @endif
            <div class="table-responsive">
                <form method="POST" enctype="multipart/form-data" action="{{url('admin/customer/'.$data->id)}}">
                    @csrf
                    @method('put')
                    <table class="table table-bordered" >
                        <tr>
                            <th>Full Name <span class="text-danger">*</span></th>
                            <th><input name="full_name" value="{{$data->full_name}}" type="text" class="form-control"></th>
                        </tr>
                        <tr>
                            <th>Email <span class="text-danger">*</span></th>
                            <th><input name="email" value="{{$data->email}}" type="email" class="form-control"></th>
                        </tr>
                        <tr>
                            <th>Password <span class="text-danger">*</span></th>
                            <th><input name="password" type="password" class="form-control"></th>
                        </tr>
                        <tr>
                            <th>Mobile <span class="text-danger">*</span></th>
                            <th><input name="mobile" value="{{$data->mobile}}" type="text" class="form-control"></th>
                        </tr>
                        <tr>
                            <th>Photo</th>
                            <th><input name="photo" type="file" >
                                <input type="hidden" value="{{$data->photo}}" name="prev_photo">
                                <img width="100px" src="{{asset('storage/app/'.$data->photo)}}" alt="">
                            </th>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <th><textarea name="address" value="{{$data->address}}" class="form-control">

                      {{$data->address}}
                            </textarea></th>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" class="btn btn-primary">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


@endsection

