@extends('layouts.backend')

@section('content')
    <div class="main-inner">
        <!-- *** Page title *** -->
        <div class="page-title">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner">
                        List Language
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{ url(config('app.backendRoute').'/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">List Language</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-table">
            <div class="row">
                <div class="col-12">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                Ngôn ngữ đã cài đặt
                            </div>
                            <div class="table-responsive">
                                <table class="table thead-light">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Ngôn ngữ</th>
                                        <th>Mã</th>
                                        <th>Cờ</th>
                                        <th>Mặc định</th>
                                        <th>Trạng thái</th>
                                        <th>Thứ tự</th>
                                        <th>Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $listinstalled as $listin )
                                        <tr>
                                            <td>{{$listin->id}}</td>
                                            <td>{{$listin->name}}</td>
                                            <td>{{$listin->code}}</td>
                                            <td><img src="{{ asset('images/flag/normal/'.$listin->flag) }}"></td>
                                            <td>
                                                <div data-table="languages"
                                                     data-id="{{ $listin->id }}"
                                                     data-col="default"
                                                     class="template-administrator24-switch Switch Round   @if($listin->default == 1) On @else Off @endif  ">
                                                    <input data-toggle="tooltip" name="default" id="status"
                                                           @if($listin->default == 1) value="status" checked
                                                           @else value="" @endif
                                                           data-title-off="Đã tắt mặc định"
                                                           data-title-on="Đã bật mặc định"
                                                           type="checkbox"
                                                           class="checkbox">
                                                    <div data-on="On" data-off="Off" class="switch"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div data-table="languages" data-id="{{ $listin->id }}"
                                                     data-col="status"
                                                     class="template-administrator24-switch Switch Round   @if($listin->status == 1) On @else Off @endif  ">
                                                    <input data-toggle="tooltip" name="status" id="status"
                                                           @if($listin->default == 1) value="status" checked
                                                           @else value="" @endif
                                                           data-title-off="Đã tắt trạng thái"
                                                           data-title-on="Đã bật trạng thái"
                                                           type="checkbox" class="checkbox">
                                                    <div data-on="On" data-off="Off" class="switch"></div>
                                                </div>
                                            </td>
                                            <td>{{$listin->sort}}</td>
                                            <td>
                                                <div class="action-buttons">
                                                    <a href="{{ route('backend.language.update',$listin->id) }}"><span
                                                            class="btn btn-sm btn-info"> <i title="Sửa"
                                                                                            class="ace-icon fa fa-pencil mr-0"></i> </span></a>
                                                    <a href="{{ route('backend.language.uninstall',$listin->code) }}"
                                                       class="red id-btn-dialog2"> <span
                                                            class="btn btn-sm btn-danger"><i title="Uninstall"
                                                                                             class="ace-icon fa fa-trash mr-0"></i></span></a>
                                                    <a href="{{ route('backend.language.trans.filename',$listin->code) }}"><span
                                                            class="btn btn-sm btn-success"> <i title="Biên dịch"
                                                                                               class="ace-icon fa fa-language bigger-130"></i> Dịch</span></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                Chưa cài đặt
                            </div>
                            <table id="stock" class="table table-bordered table-striped dataTable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th>Mã</th>
                                    <th>Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $list_not_installed as $key => $list )
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $list['name'] }}</td>
                                        <td>{{ $list['code'] }}</td>
                                        <td>
                                            <div class="action-buttons">
                                                <a href="{{ route('backend.language.install',$list['code']) }}">
                                                    <button type="button" class="btn btn-warning btn-sm">Cài đặt</button>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection
