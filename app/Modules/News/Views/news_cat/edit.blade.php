@extends('Backend::master')

@section('css')
@endsection
@section('js')
    @include('ckfinder::setup')

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
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="col-md-12">

                    @include('Backend::layouts.errors')

                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Sửa</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        {!! Form::model($cat, ['method' => 'PATCH','route' => ['news_cat.update', $cat->id],'enctype' => 'multipart/form-data']) !!}
                        <div class="card-body row">
                            <div class="col-md-12">

                                <div class="col-md-6">
                                    <label for="name">Tên:</label>
                                    <input name="name" type="text" class="form-control" id="name"
                                           placeholder="Title" value="{{ $cat->name }}">

                                </div>
                                <div class="col-md-6">
                                    <label for="slug">Đường dẫn SEO:</label>
                                    <input name="url_key" type="text" class="form-control" id="slug"
                                           placeholder="Đường dẫn SEO" value="{{ $cat->url_key }}">
                                </div>

                                <div class="col-md-6">
                                    <label for="language">Ngôn ngữ:</label>
                                    <select class="form-control" name="lang">
                                        @if(count($languages) > 0)
                                            @foreach($languages as $lang)
                                                <option value="{{$lang['code']}}" @if($lang['code'] == $cat->lang) selected @endif>{{$lang['name']}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="language">Danh mục:</label>
                                    <div id="product_cat">
                                        <select class="form-control" name="cat_id">
                                            <option value="">{{ __('admin.root_cat') }}</option>
                                            @if(count($cat_lists) > 0)
                                                @foreach($cat_lists as $id => $cat_name)
                                                    <option value="{{$id}}" @if($id == $cat->parent_id) selected @endif>{{$cat_name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="url">Ảnh:</label>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-info"
                                                    onclick="selectFileWithCKFinder('image', 'logo-icon')">Chọn ảnh
                                            </button>
                                        </div>
                                        <div class="col-md-2">
                                            <img id="logo-icon" class="imgPreview" src="@if($cat->image){{ url($cat->image) }}@endif"/>
                                            <input type="hidden" name="image" id="image" class="inputImg" value=""/>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="status">Trạng thái:</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="1" selected="selected">Bật</option>
                                        <option value="0">Tắt</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="description">Mô tả ngắn:</label>
                                    <textarea name="description" id="description" class="form-control"
                                              rows="2">{{ $cat->description }}</textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="sort">Sắp xếp:</label>
                                    <input name="sort" type="text" class="form-control" id="sort"
                                           value="{{ $cat->sort }}">
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>
    <!-- /.content -->


    <!-- /.Làm thêm js load cat theo lang -->

    <script type="text/javascript">
        $(document).ready(function () {

            $('#name').focusout(function () {
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
