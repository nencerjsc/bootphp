@extends('System::backend.layouts.master')

@section('content')
    <script src="{{ asset('adminlte/plugins/ckeditor4101/ckeditor.js') }}"></script>
    <script>
        $(function () {
            CKEDITOR.replace('description', {
                filebrowserBrowseUrl: '{{ url(env('BACKEND_URI').'/ckfinderpopup') }}',
                filebrowserImageBrowseUrl: '{{ url(env('BACKEND_URI').'/ckfinderpopup') }}',
                filebrowserFlashBrowseUrl: '{{ url(env('BACKEND_URI').'/ckfinderpopup') }}',
            });
            CKEDITOR.config.extraPlugins = 'justify , colorbutton';
        });
    </script>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"> Create Page</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{$backendUrl}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Create Page</li>
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

                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Create Page</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        {!! Form::open(array('route' => 'pages.store','method'=>'POST', 'enctype' => 'multipart/form-data')) !!}
                        <div class="card-body row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="title">Title:</label>
                                        <input name="title" type="text" class="form-control" id="title"
                                               placeholder="Title" value="{{ old('title') }}">

                                    </div>
                                    <div class="col-md-6">
                                        <label for="slug">Url Seo:</label>
                                        <input name="slug" type="text" class="form-control" id="slug"
                                               placeholder="Url Seo" value="{{ old('slug') }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="language">Languages:</label>
                                        <select class="form-control" name="language">
                                            @if(count($languages) > 0)
                                                @foreach($languages as $lang)
                                                    <option value="{{$lang['code']}}">{{$lang['name']}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="status">Status:</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="1" selected="selected">Active</option>
                                            <option value="0">UnActive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <textarea name="description" id="description" class="form-control"
                                              rows="30">{{ old('description') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="html_description">Content HTML:</label>
                                    <textarea name="html_description" id="html_description" class="form-control"
                                              rows="10">{{ old('html_description') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="title">Title SEO:</label>
                                        <input name="meta[title]" type="text" class="form-control"
                                               placeholder="Title seo, max 60 characters">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="title">Description SEO:</label>
                                        <input name="meta[description]" type="text" class="form-control"
                                               placeholder="Description seo max 160 characters">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label for="title">Keyword SEO:</label>
                                        <input name="meta[keyword]" type="text" class="form-control"
                                               placeholder="Keyword seo">
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.card-body -->
            </div>

        </section>
        <!-- /.content -->
    </div>

    <script type="text/javascript">
        $(document).ready(function () {

            $('#title').focusout(function () {
                var pname = $(this).val();
                $.ajax({
                    url: '{{url('/').'/'.$backendUrl.'/make/ajaxslug'}}',
                    method: "post",
                    data: {
                        title: pname,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        if (data) {
                            $("#slug").attr('value', data);
                        }
                    }

                });

            });
        });

    </script>
@endsection
