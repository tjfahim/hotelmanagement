@extends('layout')
@section('content')

<!-- Custom styles for this page -->
<link href="{{asset ('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Room
                <a href="{{ url('admin/room')}}" class="float-right btn btn-success btn-sm">View All</a>
            </h6>
        </div>
        <div class="card-body">
            @if (Session::has('success'))
            <p class="text-success">{{session('success')}}</p>
            @endif
            <div class="table-responsive">
                <form method="POST" action="{{url('admin/rooms/'.$data->id)}}">
                    @csrf
                    @method('put')
                    <table class="table table-bordered" >
                        <tr>
                            <th>Select Room Type</th>
                            <th><select name="rt_id" class="form-control">
                                <option value="0">--- Select ---</option>
                                @foreach ($roomtypes as $rt)
                                    <option @if ($data->room_type_id==$rt->id)
                                        selceted @endif value="{{$rt->id}}">{{$rt->title}}</option>

                                @endforeach
                            </select></th>
                        </tr>
                        <tr>
                            <th>Title</th>
                            <th><input value="{{$data->title}}" name="title" type="text" class="form-control"></th>
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

