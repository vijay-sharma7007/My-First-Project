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
                            <div class="card">
                                <div class="card-header">
                                    <h4>
                                        Create user
                                        <a href="{{ url('users') }}" class="btn btn-danger float-end">Back</a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ url('users')}}" method="post">
                                        @csrf
                                        @error('users')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="mb-3">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control" />
                                        </div>
                                        <div class="mb-3">
                                            <label>Email</label>
                                            <input type="text" name="email" class="form-control" />
                                        </div>
                                        <div class="mb-3">
                                            <label>Password</label>
                                            <input type="text" name="password" class="form-control" />
                                        </div>
                                        <div class="mb-3">
                                            <label>Roles</label>
                                            <select class="form-control" name="roles[]" multiple>
                                                <option value="">Select Role</option>
                                                @foreach($roles as $role)
                                                <option value="{{$role}}">{{$role}}</option>
                                                @endforeach
                                            </select>
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