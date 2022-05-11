@extends('System::backend.layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"> List Seo</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a
                                    href="{{ url(config('app.backendRoute').'/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Seo</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card">

                        <div class="card-header" style="border-bottom: 0">
                            <h3 class="card-title">List</h3>
                            <div class="float-right">
                                <a href="{{ url($backendUrl.'/seo/create') }}">
                                    <button class="btn btn-success"><i class="fa fa-plus-circle"></i> Create Seo
                                    </button>
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                            <div class="card-body" style="padding-top: 0;">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example1" class="table table-bordered table-striped dataTable">
                                            <thead>
                                            <tr>
                                                <th class="center sorting_disabled" rowspan="1" colspan="1"
                                                    aria-label="">
                                                    <label class="pos-rel">
                                                        <input type="checkbox" class="ace" id="checkall">
                                                        <span class="lbl"></span> </label>
                                                </th>
                                                <th>ID</th>
                                                <th>Link</th>
                                                <th>Page name</th>
                                                <th>Languages</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach( $seos as $seo )
                                                <tr>
                                                    <td class="center"><label class="pos-rel">
                                                            <input type="checkbox" class="ace mycheckbox"
                                                                   value="{{ $seo->id }}" name="check[]">
                                                            <span class="lbl"></span> </label>
                                                    </td>
                                                    <td>{{ $seo->id }}</td>
                                                    <td>{{ $seo->link }}</td>
                                                    <td>{{ $seo->meta['title'] }}</td>
                                                    <td>{{ $seo->lang }}</td>
                                                    <td>
                                                        <div class="action-buttons">
                                                            <a href="{{ url($backendUrl.'/seo/'.$seo->id.'/edit') }}">
                                                                <span class="btn btn-warning btn-sm"> <i title="Edit"
                                                                                                         class="ace-icon fa fa-pen mr-0"></i> </span></a>

                                                            <a href="#" name="{{ $seo->link }}"
                                                               link="{{ url($backendUrl.'/seo/'.$seo->id) }}"
                                                               class="deleteClick red id-btn-dialog2"
                                                               data-toggle="modal" data-target="#deleteModal">
                                                                <span class="btn btn-danger btn-sm">
                                                                    <i title="Delete"
                                                                       class="ace-icon fa fa-trash mr-0"></i>
                                                                </span>
                                                            </a>

                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            </tbody>


                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-7">
                                        <div class="float-right" id="dynamic-table_paginate">
                                            {{ $seos->links() }}
                                        </div>
                                    </div>
                                </div>
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
                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form id="deleteForm" action="" method="POST">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Seo</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div id="deleteMes" class="modal-body">

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                            </button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                        <input type="hidden" name="_method" value="delete"/>
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection
