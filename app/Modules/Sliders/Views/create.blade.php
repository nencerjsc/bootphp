@extends('layouts.backend')

@section('content')
<!-- Main content -->
<div class="main-inner">
    <!-- *** Page title *** -->
    <div class="page-title">
        <div class="row">
            <div class="col-md-12">
                <div class="inner">
                    Create New Slider
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Create New Slider</li>
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
                            {!! Form::open(array('route' => 'sliders.store','method'=>'POST','enctype'=>'multipart/form-data')) !!}
                            <div class="mt-4 row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="font-weight-bold">Name:</label>
                                        {!! Form::text('slider_name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="slider_btn_text" class="font-weight-bold">Buttom name:</label>
                                        {!! Form::text('slider_btn_text', null, array('placeholder' => 'Buttom name','class' => 'form-control')) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="slider_btn_text" class="font-weight-bold">Link:</label>
                                        {!! Form::text('slider_btn_url', null, array('placeholder' => 'Link','class' => 'form-control')) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="slider_text">Description:</label>
                                        <textarea name="slider_text" id="slider_text" class="form-control" rows="5">{{ old('slider_text') }}</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lang">Language:</label>
                                                <select class="form-control" name="lang">
                                                    @if(count($langs))
                                                        @foreach($langs as $lang)
                                                            <option value="{{$lang->code}}">{{$lang->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="sort_order">Sort order:</label>
                                                <input name="sort_order" type="text" class="form-control" id="sort_order" placeholder="Sort Order" value="{{ old('sort_order') }}" >
                                            </div>
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
</div>
@endsection
