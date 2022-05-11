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
                        <h1 class="m-0 text-dark"> Edit Page</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{$backendUrl}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Page</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
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

                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Edit Page</h3>
                        </div>
                        {!! Form::model($staticPage, ['method' => 'PATCH','route' => ['pages.update', $staticPage->id],'enctype' => 'multipart/form-data']) !!}
                        <div class="card-body row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="title">Title:</label>
                                        <input name="title" type="text" class="form-control" id="title"
                                               placeholder="Title" value="{{ $staticPage->title}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="news_slug">Url Seo:</label>
                                        <input name="slug" type="text" class="form-control" id="news_slug"
                                               placeholder="Url Seo" value="{{ $staticPage->slug}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="language">Languages:</label>
                                        <select class="form-control" name="language">
                                            @if(count($languages) > 0)
                                                @foreach($languages as $lang)
                                                    <option value="{{$lang['code']}}"
                                                            @if($lang['code'] == $staticPage->language) selected @endif>
                                                        {{$lang['name']}}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>

                                    </div>
                                    <div class="col-md-3">
                                        <label for="status">Status:</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="1" @if($staticPage['status'] == 1) selected="selected" @endif>
                                                Active
                                            </option>
                                            <option value="0" @if($staticPage['status'] == 0) selected="selected" @endif>
                                                UnActive
                                            </option>
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="content">Description:</label>
                                    <textarea name="description" id="content" class="form-control" rows="10"
                                              cols="80">{{ $staticPage->description}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="html_description">Content HTML:</label>
                                    <textarea name="html_description" id="html_description" class="form-control"
                                              rows="10" cols="80">{{$staticPage->html_description}}</textarea>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="title">Title SEO:</label>
                                        <input name="meta[title]" type="text" class="form-control"
                                               placeholder="Title seo, max 60 characters"
                                               value="{{$staticPage->meta['title']}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="title">Description SEO:</label>
                                        <input name="meta[description]" type="text" class="form-control"
                                               placeholder="Description seo max 160 characters"
                                               value="{{$staticPage->meta['description']}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label for="title">Keyword SEO:</label>
                                        <input name="meta[keyword]" type="text" class="form-control"
                                               placeholder="Keyword seo"
                                               value="{{$staticPage->meta['keyword']}}">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
@endsection
