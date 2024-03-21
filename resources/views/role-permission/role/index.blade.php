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
                                        Role
                                        <a href="{{ url('role/create') }}" class="btn btn-primary float-end">Add Role</a>
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
                                            @foreach($role as $item)
                                            <tr>
                                                <td>{{$item->id}}</td>
                                                <td>{{$item->name}}</td>
                                                <td>
                                                    <a href="{{url('role/'.$item->id.'/giv-permission')}}" class="btn btn-warning">Ade / Edit Role Permissions</a>
                                                    <a href="{{url('role/'.$item->id.'/edit')}}" class="btn btn-success">Edit</a>
                                                    <a href="{{url('role/'.$item->id.'/delete')}}" class="btn btn-danger">Delete</a>
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