@extends('System::backend.layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit Language</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a
                                    href="{{ url(config('app.backendRoute').'/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Language</li>
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
                                            {!! Form::model($lang, ['method' => 'PATCH','route' => ['backend.language.postupdate', $lang->id]]) !!}
                                            <div class="mt-4 row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name" class="font-weight-bold">Name:</label>
                                                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="code" class="font-weight-bold">Code:</label>
                                                        {!! Form::text('code', null, array('placeholder' => 'Code','class' => 'form-control')) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="flag" class="font-weight-bold">Flag:</label>
                                                        {!! Form::text('flag', null, array('placeholder' => 'flag','class' => 'form-control')) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="hreflang" class="font-weight-bold">Hreflang:</label>
                                                        {!! Form::text('hreflang', null, array('placeholder' => 'Hreflang','class' => 'form-control')) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Charset" class="font-weight-bold">Charset:</label>
                                                        {!! Form::text('charset', null, array('placeholder' => 'Charset','class' => 'form-control')) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="sort" class="font-weight-bold">Sort:</label>
                                                        {!! Form::text('sort', null, array('placeholder' => 'Sort','class' => 'form-control')) !!}
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
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
                    <script>
                        $(document).ready(function () {
                            $('.select2').select2()
                        });
                    </script>
                </div>
            </div>
        </section>
    </div>
@endsection
