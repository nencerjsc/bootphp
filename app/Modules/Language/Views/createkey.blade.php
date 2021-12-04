@extends('layouts.backend')

@section('content')
    <div class="main-inner">
        <!-- *** Page title *** -->
        <div class="page-title">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner">
                        Edit New Use
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Create Key Language</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
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
                                {!! Form::open(array('route' => 'backend.language.trans.createkey','method'=>'POST')) !!}
                                <div class="mt-4 row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name" class="font-weight-bold">File Name:</label>
                                            {!! Form::text('file', null, array('placeholder' => 'File Name','class' => 'form-control')) !!}
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="font-weight-bold">{{$lang->name}}:</label>
                                            <div class="row">
                                                <div class="col-md-6"> {!! Form::text('key', null, array('placeholder' => 'Keyword','class' => 'form-control')) !!}</div>
                                                <div class="col-md-6"> {!! Form::text('value', null, array('placeholder' => 'Content','class' => 'form-control')) !!}</div>
                                                <input name="lang" type="hidden" class="form-control"
                                                       value="{{$lang->code}}">
                                            </div>

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
@endsection
