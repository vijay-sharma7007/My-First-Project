@extends('sidebar')
@section('main-section')
<!doctype html>
<html lang="en">

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        @if(session('status'))
                        <div class="alert alert-success">{{session('status')}}</div>
                        @endif
                        <div class="card mt-3">
                            <div class="card-header">
                                <h4>
                                    permisssion
                                    <a href="{{ url('permission/create') }}" class="btn btn-primary float-end">Add Permission</a>
                                </h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($permission as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>
                                                <a href="{{url('permission/'.$item->id.'/edit')}}" class="btn btn-success">Edit</a>
                                                <a href="{{url('permission/'.$item->id.'/delete')}}" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</body>

</html>
@endsection