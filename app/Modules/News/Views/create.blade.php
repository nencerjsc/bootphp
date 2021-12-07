@extends('layouts.backend')

@section('content')
    <div class="main-inner">
        <!-- *** Page title *** -->
        <div class="page-title">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner">
                        Edit New Slider
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit New Slider</li>
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
                            {!! Form::open(array('route' => 'news.store','method'=>'POST', 'enctype' => 'multipart/form-data')) !!}
                                <div class="mt-4 row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="title">Tiêu đề:</label>
                                                <input name="title" type="text" class="form-control" id="title"
                                                       placeholder="Title" value="{{ old('title') }}">

                                            </div>
                                            <div class="col-md-6">
                                                <label for="news_slug">Đường dẫn SEO:</label>
                                                <input name="news_slug" type="text" class="form-control" id="news_slug"
                                                       placeholder="Đường dẫn SEO" value="{{ old('news_slug') }}">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="author">Tác giả:</label>
                                                <input name="author" type="text" class="form-control" id="author"
                                                       value="{{ $author }}">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="author_email">Email:</label>
                                                <input name="author_email" type="text" class="form-control" id="author_email"
                                                       value="{{ $author_email }}">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="language">Danh mục:</label>
                                                <div id="cats">
                                                    <select class="form-control" name="cats">
                                                        <option value="">{{ __('admin.root_cat') }}</option>
                                                        @if(count($cats) > 0)
                                                            @foreach($cats as  $cate)
                                                                <option value="{{$cate->id}}">{{$cate->name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="url">Ảnh:</label>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <button type="button" class="btn btn-default"
                                                                onclick="selectFileWithCKFinder('image', 'logo-icon')">Chọn ảnh
                                                        </button>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <img id="logo-icon" class="imgPreview" src="{{ old('image') }}"/>
                                                        <input type="hidden" name="image" id="image" class="inputImg" value=""/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="view_count">Lượt xem:</label>
                                                <input name="view_count" type="text" class="form-control" id="view_count"
                                                       value="0">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="language">Ngôn ngữ:</label>
                                                <select class="form-control" name="language">
                                                    @if(count($languages) > 0)
                                                        @foreach($languages as $lang)
                                                            <option value="{{$lang['code']}}">{{$lang['name']}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="publish_date">Ngày đăng:</label>
                                                <input name="publish_date" type="text" class="form-control"
                                                       id="publish_date" value="{{ old('publish_date') }}">

                                            </div>
                                            <div class="col-md-3">
                                                <label for="status">Trạng thái:</label>
                                                <select class="form-control" name="status" id="status">
                                                    <option value="1" selected="selected">Bật</option>
                                                    <option value="0">Tắt</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label for="short_description">Mô tả ngắn:</label>
                                            <textarea name="short_description" id="short_description" class="form-control"
                                                      rows="2">{{ old('short_description') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="content">Nội dung:</label>
                                            <textarea name="description" id="description" class="form-control"
                                                      rows="10">{{ old('description') }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="tags">Seo Title:</label>
                                                    <input name="meta[title]" type="text" class="form-control"
                                                           placeholder="Khoảng 60 ký tự">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="tags">Seo Description:</label>
                                                    <input name="meta[description]" type="text" class="form-control"
                                                           placeholder="Nội dung mô tả cho seo, khoảng 158 ký tự">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="tags">Seo Keyword:</label>
                                                    <input name="meta[keyword]" type="text" class="form-control"
                                                           placeholder="Các từ khóa seo của bài viết">
                                                </div>

                                            </div>
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
                            $("#news_slug").attr('value', data);
                        }
                    }

                });

            });
        });

    </script>
@endsection
