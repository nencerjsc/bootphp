@extends('System::backend.layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit: {{ $slider->slider_name }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a
                                    href="{{ url(config('app.backendRoute').'/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Sliders</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- Main content -->
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
                                            {!! Form::model($slider, ['method' => 'PATCH','route' => ['sliders.update', $slider->id],'enctype'=>'multipart/form-data']) !!}
                                            <div class="mt-4 row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name" class="font-weight-bold">Name:</label>
                                                        {!! Form::text('slider_name', $slider->slider_name, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="slider_btn_text" class="font-weight-bold">Buttom
                                                            name:</label>
                                                        {!! Form::text('slider_btn_text', $slider->slider_btn_text, array('placeholder' => 'Buttom name','class' => 'form-control')) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="slider_btn_text"
                                                               class="font-weight-bold">Link:</label>
                                                        {!! Form::text('slider_btn_url', $slider->slider_btn_url, array('placeholder' => 'Link','class' => 'form-control')) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="slider_text">Description:</label>
                                                        <textarea name="slider_text" id="slider_text"
                                                                  class="form-control"
                                                                  rows="5">{!! $slider->slider_text !!}</textarea>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="lang">Language:</label>
                                                                <select class="form-control" name="lang">
                                                                    @if(count($langs))
                                                                        @foreach($langs as $lang)
                                                                            <option value="{{$lang->code}}"
                                                                                    @if($lang->code == $slider->lang) selected @endif>
                                                                                {{$lang->name}}
                                                                            </option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="sort_order">Sort order:</label>
                                                                {!! Form::text('sort_order', $slider->sort_order, array('placeholder' => 'Sort Order','class' => 'form-control')) !!}
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
            </div>
        </section>
    </div>
@endsection
