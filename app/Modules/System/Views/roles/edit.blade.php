@extends('System::backend.layouts.master')

@section('content')
    <!-- Main content -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit Roles</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a
                                    href="{{ url(config('app.backendRoute').'/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Roles</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="main-inner">
                    <!-- *** Page title *** -->
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-create" id="form-create">
                        <div class="row">
                            <div class="col-12">
                                <div class="card-table">
                                    <div class="card">
                                        <div class="card-body">
                                            {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
                                            <div class="mt-4 row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name" class="font-weight-bold">Name:</label>
                                                        <input name="name" type="text" class="form-control" id="name"
                                                               placeholder="Enter Name" value="{{ $role->name }}"
                                                               readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name" class="font-weight-bold">Guard
                                                            Name:</label>
                                                        <input name="guard_name" type="text" class="form-control" id="guard_name"
                                                               placeholder="Guard Name"
                                                               value="{{ $role->guard_name }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name"
                                                               class="font-weight-bold">Description:</label>
                                                        <input name="description" type="text" class="form-control" id="description"
                                                               value="{{ $role->description }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name"
                                                               class="font-weight-bold">Permissions:</label>
                                                        <select name="permission[]" class="form-control select2"
                                                                multiple="multiple"
                                                                data-placeholder="Select Permissions"
                                                                style="width: 100%;">
                                                            @foreach($permission as $value)
                                                                @if( in_array($value->id, $rolePermissions) )
                                                                    <option value="{{ $value->id }}"
                                                                            selected="selected">{{ $value->name }}</option>
                                                                @else
                                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                                @endif

                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                        <button type="submit" class="btn btn-primary">Submit
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
