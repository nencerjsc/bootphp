@extends('System::backend.layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Create New Seo</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a
                                    href="{{ url(config('app.backendRoute').'/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Create New Seo</li>
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
                        <div class="card-table">
                            <div class="card">
                                <div class="card-body">
                                    {!! Form::open(array('route' => 'seo.store','method'=>'POST')) !!}
                                    <div class="mt-4 row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Url:</label>
                                                <input name="link" type="text" class="form-control" id="link"
                                                       placeholder="Copy Url muốn tạo vào đây: http://"
                                                       value="{{ old('link') }}" required="true">
                                            </div>

                                            <div class="form-group">
                                                <label style="display:block">Ảnh đại diện của trang</label>
                                                <div class="preview">
                                                    <img id="logo-icon" class="imgPreview" src=""/>
                                                    <input type="hidden" name="image" id="image" class="inputImg"
                                                           value="{{ old('image') }}"/>
                                                </div>
                                                <button type="button" class="btn btn-primary"
                                                        onclick="selectFileWithCKFinder('image', 'logo-icon')">Chọn ảnh
                                                </button>

                                            </div>

                                            <div class="form-group">
                                                <label for="language">Ngôn ngữ:</label>
                                                <select class="form-control" name="lang">
                                                    @foreach($langs as $lang)
                                                        <option value="{{$lang->code}}">{{$lang->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="title">Tiêu đề SEO:</label>
                                                <input name="meta[title]" type="text" class="form-control"
                                                       placeholder="Khoảng 64 ký tự" value="{{ old('title') }}"
                                                       required="true">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Mô tả SEO:</label>
                                                <textarea name="meta[description]" class="form-control"
                                                          placeholder="Mô tả seo, khoảng 168 ký tự">{{ old('description') }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="keyword">Từ khóa SEO:</label>
                                                <textarea name="meta[keyword]" class="form-control"
                                                          placeholder="Từ khóa seo">{{ old('keyword') }}</textarea>
                                            </div>

                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                    {!! Form::close() !!}
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
    </div>
        <!-- /.content -->
@endsection
