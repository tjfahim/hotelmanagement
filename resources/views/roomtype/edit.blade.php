@extends('layout')
@section('content')

<!-- Custom styles for this page -->
<link href="{{asset ('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Room Type
                <a href="{{ url('admin/roomtype')}}" class="float-right btn btn-success btn-sm">View All</a>
            </h6>
        </div>
        <div class="card-body">
            @if (Session::has('success'))
            <p class="text-success">{{session('success')}}</p>
            @endif
            <div class="table-responsive">
                <form method="POST" action="{{url('admin/roomtype/'.$data->id)}}">
                    @csrf
                    @method('put')
                    <table class="table table-bordered" >
                        <tr>
                            <th>Title</th>
                            <th><input value="{{$data->title}}" name="title" type="text" class="form-control"></th>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <th><input name="price"  value="{{$data->price}}"type="number" class="form-control"></th>
                        </tr>
                        <tr>
                            <th>Detail</th>
                            <th><textarea value="{{$data->detail}}" name="detail" class="form-control">{{$data->detail}}</textarea></th>
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

