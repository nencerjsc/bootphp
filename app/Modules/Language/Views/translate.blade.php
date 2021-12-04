@extends('layouts.backend')

@section('content')
    <div class="main-inner">
        <!-- *** Page title *** -->
        <div class="page-title">
            <div class="row align-items-end">
                <div class="col-md-4">
                    <div class="inner flex-column justify-content-center align-items-start">
                        List Language
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url(config('app.backendRoute').'/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">List Language</li>
                        </ol>
                    </div>
                </div>
                <div class="col-md-8">
                    <!-- *** List button & form inline *** -->
                    <div class="list-button mt-3 mt-md-0">
                        <div class="text-md-right">
                            @if(isset($mod_menu))
                                {!! $mod_menu !!}
                            @endif
                        </div>
                    </div>
                    <!-- *** End list button & form inline *** -->
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
                        <div class="card-header pb-0 border-0 bg-transparent rounded-0">
                            <!-- *** List button & form inline *** -->
                            <div class="list-button mt-0">
                                <div class="row">
                                   <div class="col-md-12"> {!! $filter !!}</div>

                                </div>
                            </div>
                            <!-- *** End list button & form inline *** -->
                        </div>
                        <div class="card-body">
                            <div class="card-title">List</div>
                            <div class="table-responsive">
                                <table class="table thead-light">
                                    <thead>
                                    <tr>
                                        <th>Ngôn ngữ</th>
                                        <th>Loại</th>
                                        <th>Tệp tin</th>
                                        <th>Từ khóa</th>
                                        <th>Nội dung (tự động lưu)</th>
                                        <th>Ngày tạo</th>
                                        <th>Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($trans) > 0)
                                        @foreach( $trans as $tran )
                                            <tr>
                                                <td>{{$tran->lang_code}}</td>
                                                <td>{{$tran->type}}</td>
                                                <td>{{$tran->filename}}</td>
                                                <td>{{$tran->lang_key}}</td>
                                                <td><input name="content" data-id="{{$tran->id}}"
                                                           value="{{$tran->content}}" class="form-control translate">
                                                </td>
                                                <td>{{$tran->created_at}}</td>
                                                <td>
                                                    <a href="{{ url('/language/'.$tran->id.'/del') }}"
                                                       onclick="return confirm('Bạn có chắc chắn thực hiện hành động này?')">
                                                        <span class="btn btn-sm btn-danger"><i
                                                                class="ace-icon fa fa-trash bigger-130"></i> </span></a>
                                                </td>

                                            </tr>
                                        @endforeach

                                    @endif
                                    </tbody>
                                </table>
                                {{ $trans->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="application/javascript">
        $(document).ready(function () {
            $(".translate").on('change', function (e) {
                var contentt = $(this).val();
                var id = $(this).attr("data-id");
                $.ajax({
                    url: "{{route('backend.language.ajax.translate')}}",
                    method: "post",
                    data: {
                        id: id,
                        contentt: contentt,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {

                    }

                });

            });


        });
    </script>

@endsection
