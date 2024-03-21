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
                            <div class="card">
                                <div class="card-header">
                                    <h4>
                                        Create permisssion
                                        <a href="{{ url('permission') }}" class="btn btn-danger float-end">Back</a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ url('permission/'.$permission->id)}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label>Permissions Name</label>
                                            <input type="text" name="name" class="form-control" value="{{$permission->name}}" />
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-success">Update</button>
                                        </div>
                                    </form>
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