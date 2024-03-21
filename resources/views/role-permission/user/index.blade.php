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
                                        user
                                        <a href="{{ url('users/create') }}" class="btn btn-primary float-end">Add user</a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>name</th>
                                                <th>email</th>
                                                <th>Roles</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $item)
                                            <tr>
                                                <td>{{$item->id}}</td>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->email}}</td>
                                                <td>
                                                    @if(!empty($item->getRoleNames()))
                                                    @foreach($item->getRoleNames() as $roleName)
                                                    <label class="badge bg-primary mx-1">{{$roleName}}</label>
                                                    @endforeach
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{url('users/'.$item->id.'/edit')}}" class="btn btn-success">Edit</a>
                                                    <a href="{{url('users/'.$item->id.'/delete')}}" class="btn btn-danger">Delete</a>
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