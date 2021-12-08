@extends('System::backend.layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Create New Currency</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a
                                    href="{{ url(config('app.backendRoute').'/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Create New Currency</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="main-inner">
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
                                            {!! Form::open(array('route' => 'currencies.store','method'=>'POST')) !!}
                                            <div class="mt-4 row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name" class="font-weight-bold">Name:</label>
                                                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name" class="font-weight-bold">Code:</label>
                                                        {!! Form::select('code',$lsCurrency,[], array('class' => 'form-control')) !!}
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="symbol_right" class="font-weight-bold">Symbol
                                                            Left:</label>
                                                        {!! Form::text('symbol_right', null, array('placeholder' => 'Enter Symbol Left','class' => 'form-control')) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="symbol_right" class="font-weight-bold">Symbol
                                                            Right:</label>
                                                        {!! Form::text('symbol_right', null, array('placeholder' => 'Enter Symbol Right','class' => 'form-control')) !!}
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name" class="font-weight-bold">Decimal:</label>
                                                        {!! Form::text('decimal', null, array('placeholder' => 'Enter Decimal','class' => 'form-control')) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="symbol_right" class="font-weight-bold">Rate
                                                            USD:</label>
                                                        {!! Form::text('value', null, array('placeholder' => 'Rate USD','class' => 'form-control')) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="symbol_right"
                                                               class="font-weight-bold">Seperator:</label>
                                                        {!! Form::select('seperator', array('comma'=>'Comma','space'=>'Space','dot'=>'Dot'),[], array('class' => 'form-control')) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Sort" class="font-weight-bold">Sort:</label>
                                                        {!! Form::text('sort', null, array('placeholder' => 'Sort','class' => 'form-control')) !!}
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
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
