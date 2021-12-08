@extends('System::backend.layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"> List user</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a
                                    href="{{ url(config('app.backendRoute').'/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">List user</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="main-inner">
                    <!-- *** Page title *** -->
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
                                                <div class="col-md-6">
                                                    <div class="text-left">
                                                        <a class="btn btn-success bg-gradient"
                                                           href="{{ url($backendUrl.'/currencies/create') }}">
                                                            <i class="fas fa-plus mr-1"></i>Create New Currency
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="text-right mt-3 mt-md-0">
                                                        <form action=""
                                                              class="form-inline justify-content-end shadow-none">
                                                            <div class="row row-5">
                                                                <div class="col">
                                                                    <input type="text" name="keyword"
                                                                           class="form-control float-right"
                                                                           placeholder="Search"
                                                                           style="padding-right: 42px;">
                                                                </div>
                                                                <div class="d-flex form-inline-button ml-1">
                                                                    <button class="btn btn-primary"><i
                                                                            class="fas fa-search mr-0"></i></button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- *** End list button & form inline *** -->
                                    </div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            Currency
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table thead-light">
                                                <thead>
                                                <tr>
                                                    <th class="center sorting_disabled" rowspan="1" colspan="1"
                                                        aria-label="">
                                                        <label class="pos-rel">
                                                            <input type="checkbox" class="ace" id="checkall">
                                                            <span class="lbl"></span> </label>
                                                    </th>
                                                    <th>Name</th>
                                                    <th>Code</th>
                                                    <th>Rate USD</th>
                                                    <th>Symbol</th>
                                                    <th>Status</th>
                                                    <th>Update at</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach( $currencies as $currency )
                                                    <tr>
                                                        <td class="center"><label class="pos-rel">
                                                                <input type="checkbox" class="ace mycheckbox"
                                                                       value="{{ $currency->id }}" name="check[]">
                                                                <span class="lbl"></span> </label>
                                                        </td>
                                                        <td>{{ $currency->name }}</td>
                                                        <td>{{ $currency->code }}</td>
                                                        <td>{{ strval(round($currency->value, $currency->decimal)) }}</td>
                                                        <td>
                                                            {{ $currency->symbol_left ?? $currency->symbol_right }}
                                                        </td>
                                                        <td>
                                                            <div data-table="currencies" data-id="{{ $currency->id }}"
                                                                 data-col="status"
                                                                 class="template-administrator24-switch Switch Round @if($currency->status == 1) On @else Off @endif  ">
                                                                <input data-toggle="tooltip" name="default" id="status"
                                                                       @if($currency->status == 1) value="status"
                                                                       checked @else value="" @endif
                                                                       data-title-off="Đã tắt" data-title-on="Đã bật "
                                                                       type="checkbox" class="checkbox">
                                                                <div data-on="On" data-off="Off" class="switch"></div>
                                                            </div>
                                                        </td>

                                                        <td>{!! $currency->updated_at !!}</td>
                                                        <td>
                                                            <div class="action-buttons">
                                                                <a href="{{ url($backendUrl.'/currencies/'.$currency->id.'/edit') }}">
                                                                    <span class="btn btn-sm btn-warning"> <i title="Sửa"
                                                                                                             class="ace-icon fa fa-pen mr-0"></i> </span>
                                                                </a>
                                                                <a href="#" name="{{ $currency->name }}"
                                                                   link="{{ url($backendUrl.'/currencies/'.$currency->id) }}"
                                                                   class="deleteClick red id-btn-dialog2"
                                                                   data-toggle="modal"
                                                                   data-target="#deleteModal"><span
                                                                        class="btn btn-sm btn-danger"><i title="Delete"
                                                                                                         class="ace-icon fa fa-trash mr-0"></i></span></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row row-10">
                                            <div class="col-md-6">
                                                <div class="form-inline d-inline-flex w-auto shadow-none">
                                                    <div class="row row-5">
                                                        <div class="col">
                                                            <select name="" class="form-control" id="">
                                                                <option value="-1">
                                                                    Action
                                                                </option>
                                                                <option value="">
                                                                    Delete
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="d-flex form-inline-button ml-1">
                                                            <button class="btn btn-primary ml-1">
                                                                Submit
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                {{$currencies->appends(request()->query())->links()}}
                                            </div>
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
    <!-- Delete form -->
    <script type="text/javascript">
        $(document).ready(function () {
            $(".deleteClick").click(function () {
                var link = $(this).attr('link');
                var name = $(this).attr('name');
                $("#deleteForm").attr('action', link);
                $("#deleteMes").html("Delete : " + name + " ?");
            });
        });
    </script>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="deleteForm" action="" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="deleteMes" class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <input type="hidden" name="_method" value="delete"/>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
    <!-- End Delete form-->
@endsection
