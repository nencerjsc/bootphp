@extends('System::backend.layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Create Roles</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a
                                    href="{{ url(config('app.backendRoute').'/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Create Roles</li>
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
                                            {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                                                <div class="mt-4 row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name" class="font-weight-bold">Name:</label>
                                                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name" class="font-weight-bold">Guard
                                                                Name:</label>
                                                            {!! Form::text('guard_name', null, array('placeholder' => 'Guard Name','class' => 'form-control')) !!}
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name"
                                                                   class="font-weight-bold">Description:</label>
                                                            <input name="description" type="text" class="form-control"
                                                                   id="description" placeholder="Description"
                                                                   value="{{ old('description') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name"
                                                                   class="font-weight-bold">Permissions:</label>
                                                            <select name="permission[]" class="form-control select2"
                                                                    multiple="multiple"
                                                                    data-placeholder="Select Permissions"
                                                                    style="width: 100%;">
                                                                @foreach($permission as $value)
                                                                    <option
                                                                        value="{{ $value->id }}">{{ $value->name }}</option>
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
    <!-- /.content -->

{{--    <script type="text/javascript">--}}
{{--        $(document).ready(function () {--}}
{{--            $('.select2').select2()--}}
{{--        });--}}
{{--    </script>--}}
@endsection
