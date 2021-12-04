@extends('layouts.backend')

@section('content')
{{--    <!-- Main content -->--}}
{{--    <section class="content">--}}
{{--        <div class="row">--}}
{{--            <div class="col-12">--}}

{{--                <div class="card">--}}

{{--                    <div class="card-header">--}}
{{--                        <h3 class="card-title">Sửa ngôn ngữ</h3>--}}
{{--                    </div>--}}
{{--                    <!-- /.card-header -->--}}
{{--                    <div class="card-body" style="padding-top: 0;">--}}
{{--                        <div class="row"><div class="col-sm-12">--}}

{{--                                {!! Form::model($lang, ['method' => 'PATCH','route' => ['backend.language.postupdate', $lang->id]]) !!}--}}
{{--                                <div class="card-body row">--}}

{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="name">Tên:</label>--}}
{{--                                            <input name="name" type="text" class="form-control" id="name" placeholder="Tên ngôn ngữ" value="{{$lang->name}}">--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="code">Mã:</label>--}}
{{--                                            <input name="code" type="text" class="form-control" id="code" placeholder="Mã ngôn ngữ" value="{{$lang->code}}">--}}
{{--                                        </div>--}}

{{--                                        <div class="form-group">--}}
{{--                                            <label for="flag">Cờ quốc gia:</label>--}}
{{--                                            <input name="flag" type="text" class="form-control" id="flag" placeholder="Ví dụ: us.png" value="{{$lang->flag}}">--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="hreflang">Mã ngôn ngữ theo chuẩn Google:</label>--}}
{{--                                            <input name="hreflang" type="text" class="form-control" id="hreflang" placeholder="hreflang" value="{{$lang->hreflang}}">--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="charset">Charset:</label>--}}
{{--                                            <input name="charset" type="text" class="form-control" id="charset" placeholder="charset" value="{{$lang->charset}}">--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="default">Mặc định:</label>--}}
{{--                                            <input name="default" id="default" type="checkbox" value="default" data-toggle="toggle" style="display: none;" @if($lang->default == 1) checked="checked" @endif>--}}
{{--                                            <div class="Switch Round On" style="vertical-align:top;margin-left:10px;">--}}
{{--                                                <div class="Toggle"></div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="status">Trạng thái:</label>--}}
{{--                                            <input name="status" id="status" type="checkbox" value="status" data-toggle="toggle" style="display: none;" @if($lang->status == 1) checked="checked" @endif>--}}
{{--                                            <div class="Switch Round On" style="vertical-align:top;margin-left:10px;">--}}
{{--                                                <div class="Toggle"></div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="form-group">--}}
{{--                                            <label for="sort">Thứ tự:</label>--}}
{{--                                            <input name="sort" type="text" class="form-control" id="sort" placeholder="sort" value="{{$lang->sort}}">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}


{{--                                </div>--}}
{{--                                <!-- /.card-body -->--}}

{{--                                <div class="card-footer">--}}
{{--                                    <button type="submit" class="btn btn-primary">Submit</button>--}}
{{--                                </div>--}}
{{--                                {!! Form::close() !!}--}}

{{--                            </div></div>--}}

{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--            <!-- /.card -->--}}

{{--        </div>--}}
{{--        <!-- /.card -->--}}
{{--        </div>--}}
{{--        <!-- /.col -->--}}
{{--        </div>--}}
{{--        <!-- /.row -->--}}
{{--    </section>--}}
{{--    <!-- /.content -->--}}

    <div class="main-inner">
        <!-- *** Page title *** -->
        <div class="page-title">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner">
                        Edit Language
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Language</li>
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
                                {!! Form::model($lang, ['method' => 'PATCH','route' => ['backend.language.postupdate', $lang->id]]) !!}
                                <div class="mt-4 row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name" class="font-weight-bold">Name:</label>
                                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                        </div>
                                        <div class="form-group">
                                            <label for="code" class="font-weight-bold">Code:</label>
                                            {!! Form::text('code', null, array('placeholder' => 'Code','class' => 'form-control')) !!}
                                        </div>
                                        <div class="form-group">
                                            <label for="flag" class="font-weight-bold">Flag:</label>
                                            {!! Form::text('flag', null, array('placeholder' => 'flag','class' => 'form-control')) !!}
                                        </div>
                                        <div class="form-group">
                                            <label for="hreflang" class="font-weight-bold">Hreflang:</label>
                                            {!! Form::text('hreflang', null, array('placeholder' => 'Hreflang','class' => 'form-control')) !!}
                                        </div>
                                        <div class="form-group">
                                            <label for="Charset" class="font-weight-bold">Charset:</label>
                                            {!! Form::text('charset', null, array('placeholder' => 'Charset','class' => 'form-control')) !!}
                                        </div>
                                        <div class="form-group">
                                            <label for="sort" class="font-weight-bold">Sort:</label>
                                            {!! Form::text('sort', null, array('placeholder' => 'Sort','class' => 'form-control')) !!}
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
        <script>
            $(document).ready(function(){
                $('.select2').select2()
            });
        </script>
@endsection
