@extends('layouts.backend')

@section('content')
    <!-- Main content -->
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
                                {!! Form::open(array('route' => 'news_cat.store','method'=>'POST', 'enctype' => 'multipart/form-data')) !!}
                                <div class="mt-4 row">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <label for="name">Name:</label>
                                            <input name="name" type="text" class="form-control" id="name"
                                                   placeholder="Title" value="{{ old('name') }}">

                                        </div>
                                        <div class="col-md-6">
                                            <label for="slug">Slug:</label>
                                            <input name="url_key" type="text" class="form-control" id="slug"
                                                   placeholder="Slug" value="{{ old('slug') }}">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="language">Language:</label>
                                            <select class="form-control" name="lang">
                                                @if(count($languages) > 0)
                                                    @foreach($languages as $lang)
                                                        <option value="{{$lang['code']}}">{{$lang['name']}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="language">Parent:</label>
                                            <div id="product_cat">
                                                <select class="form-control" name="cat_id">
                                                    <option value="">{{ __('admin.root_cat') }}</option>
                                                    @if(count($cat_lists) > 0)
                                                        @foreach($cat_lists as  $cat_name)
                                                            <option value="{{$cat_name->id}}">{{$cat_name->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="url">Image:</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <button type="button" class="btn btn-info"
                                                            onclick="selectFileWithCKFinder('image', 'logo-icon')">Select image
                                                    </button>
                                                </div>
                                                <div class="col-md-6">
                                                    <img id="logo-icon" class="imgPreview" src="{{ old('image') }}"/>
                                                    <input type="hidden" name="image" id="image" class="inputImg" value=""/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="status">Status:</label>
                                            <select class="form-control" name="status" id="status">
                                                <option value="1" selected="selected">Active</option>
                                                <option value="0">disabled</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="description">Content:</label>
                                            <textarea name="description" id="description" class="form-control"
                                                      rows="2">{{ old('description') }}</textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="sort">Sort Order:</label>
                                            <input name="sort" type="text" class="form-control" id="sort"
                                                   value="0">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
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
