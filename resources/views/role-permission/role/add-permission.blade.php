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
                            <div class="alert alert-success">
                                {{session('status')}}
                            </div>
                            @endif

                            <div class="card">
                                <div class="card-header">
                                    <h4>
                                        Role : {{$role->name}}
                                        <a href="{{ url('role') }}" class="btn btn-danger float-end">Back</a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ url('role/'.$role->id.'/giv-permission') }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            @error('permission')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <label>Permisssion</label>
                                            <div class="row">
                                                @foreach($permission as $permission)
                                                <div class="col-sm-3">
                                                    <label>
                                                        <input type="checkbox" name="permission[]" class="" value="{{$permission->name}}" {{ in_array($permission->id, $rolePermission) ? 'checked':''}} />
                                                        {{$permission->name}}
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>

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


@foreach($permission as $key => $permission)
<div class="col-sm-3">
    <label>
        
    </label>
</div>
@endforeach