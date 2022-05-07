@extends('System::backend.layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit Currencies</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a
                                    href="{{ url(config('app.backendRoute').'/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Currencies</li>
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
                                    {!! Form::model($currency, ['method' => 'PATCH','route' => ['currencies.update', $currency->id]]) !!}
                                    <div class="card-body row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Tên:</label>
                                                <input name="name" type="text" class="form-control" id="name"
                                                       placeholder="Name"
                                                       value="{{ $currency->name}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="code">Mã:</label>
                                                {!! Form::select('code',$lsCurrency,$currency->code, array('class' => 'form-control')) !!}
                                            </div>
                                            <div class="form-group">
                                                <label for="decimal">Số thập phân:</label>
                                                <input name="decimal" type="text" class="form-control" id="decimal"
                                                       placeholder="Enter Decimal" value="{{ $currency->decimal}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="symbol_left">Ký hiệu trái:</label>
                                                <input name="symbol_left" type="text" class="form-control" id="url"
                                                       placeholder="Enter Symbol Left"
                                                       value="{{ $currency->symbol_left}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="symbol_right">Ký hiệu phải:</label>
                                                <input name="symbol_right" type="text" class="form-control"
                                                       id="symbol_right"
                                                       placeholder="Enter Symbol Right"
                                                       value="{{ $currency->symbol_right}}">
                                            </div>


                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="value">Giá của 1 USD:</label>
                                                <input name="value" type="text" class="form-control" id="value"
                                                       placeholder="Enter rate USD" value="{{ $currency->value}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="seperator">Dấu hàng nghìn:</label>
                                                {!! Form::select('seperator', array('comma'=>'Comma','space'=>'Space','dot'=>'Dot'),$currency->seperator, array('class' => 'form-control')) !!}
                                            </div>
                                            <div class="form-group">
                                                <label for="sort">Sắp xếp:</label>
                                                <input name="sort" type="text" class="form-control" id="sort"
                                                       placeholder="Enter Sort" value="{{ $currency->sort}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="status">Trạng thái:</label>
                                                <select class="form-control" name="status">
                                                    <option value="1" @if($currency->status == 1) selected @endif>Bật
                                                    </option>
                                                    <option value="0" @if($currency->status == 0) selected @endif>Tắt
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>

                                    </div>
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
        </div>
            </div>
        </section>
        <!-- /.content -->
@endsection
