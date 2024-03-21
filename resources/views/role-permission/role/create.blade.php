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
                            Create Role
                            <a href="{{ url('role') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('role')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label>Role Name</label>
                                <input type="text" name="name" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">Save</button>
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