@extends('System::backend.layouts.master')

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"> Create Menu Use</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{$backendUrl}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Create Menu</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
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
                    <div class="card-create" id="form-create">
                        <div class="row">
                            <div class="col-12">
                                <div class="card-table">
                                    <div class="card">
                                        <div class="card-body">
                                            {!! Form::open(array('route' => 'menu.store','method'=>'POST', 'enctype' => 'multipart/form-data')) !!}
                                            <div class="mt-4 row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-6">
                                                            <label for="title">Title:</label>
                                                            <input name="name" type="text" class="form-control" id="title"
                                                                   placeholder="Title" value="{{ old('name') }}">

                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="news_slug">Url:</label>
                                                            <input name="url" type="text" class="form-control" id="news_slug"
                                                                   placeholder="Đường dẫn url" value="{{ old('url') }}">
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <div class="col-md-6">
                                                            <label for="author">Type:</label>
                                                            <select class="form-control" name="menu_type" id="menu_type">
                                                                <option value="">-- Select menu type --</option>
                                                                <option value="header"> Header </option>
                                                                <option value="footer"> Footer </option>

                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="title">Parent menu:</label>
                                                            <select class="form-control" name="parent_id" id="parent_id">
                                                                <option value="0">-- Select parent menu --</option>
                                                                {!! $selectHtml !!}
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-6">
                                                            <label for="view_count">Sort:</label>
                                                            <input name="sort_order" type="text" class="form-control" id="view_count"
                                                                   value="1">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="language">Language:</label>
                                                            <select class="form-control" name="language">
                                                                @if(count($langs) > 0)
                                                                    @foreach($langs as $lang)
                                                                        <option value="{{$lang->code}}">{{$lang->name}}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-6">
                                                            <label for="status">Status:</label>
                                                            <select class="form-control" name="status" id="status">
                                                                <option value="1" selected="selected">Active</option>
                                                                <option value="0">UnActive</option>
                                                            </select>
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
            </div>
        </section>
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
