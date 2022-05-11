@extends('System::backend.layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"> Page</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a
                                    href="{{ url(config('app.backendRoute').'/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Page</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="row">
                <div class="col-12">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
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
                    <div class="card">

                        <div class="card-header pb-0 border-0 bg-transparent rounded-0">
                            <div class="list-button mt-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="text-left">
                                            <a class="btn btn-success bg-gradient"
                                               href="{{ url($backendUrl.'/pages/create') }}">
                                                <i class="fas fa-plus mr-1"></i>Create News
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-right mt-3 mt-md-0">
                                            <form action="" class="form-inline justify-content-end shadow-none">
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

                        </div>
                        <!-- /.card-header -->
                            <div class="card-body" style="padding-top: 0;">
                                <div class="card-title">
                                    List Page
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
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Language</th>
                                            <th>Status</th>
                                            <th>Created at</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @if(!count($staticPage))
                                            <tr>
                                                <td colspan="10" class="text-center">Empty data !!!</td>
                                            </tr>
                                        @else
                                            @foreach( $staticPage as $post )
                                                <tr>
                                                    <td class="center"><label class="pos-rel">
                                                            <input type="checkbox" class="ace mycheckbox"
                                                                   value="{{ $post->id }}" name="check[]">
                                                            <span class="lbl"></span> </label>
                                                    </td>
                                                    <td>{{ $post->id }}</td>
                                                    <td><a href="{{url('post/'.$post->slug)}}.html"
                                                           target="_blank">{{ $post->title }}</a></td>
                                                    <td>{{ $post->language }}</td>
                                                    <td>
                                                        @if($post->status)
                                                            <label class="badge badge-success">Activate</label>
                                                        @else
                                                            <label class="badge badge-danger">UnActivate</label>
                                                        @endif
                                                    </td>
                                                    <td>{{ $post->created_at }}</td>
                                                    <td>
                                                        <div class="action-buttons">
                                                            <a href="{{ url($backendUrl.'/pages/'.$post->id.'/edit') }}">
                                                                <span class="btn btn-sm btn-info">
                                                                    <i title="Edit" class="ace-icon fas fa-pen mr-0"></i>
                                                                </span>
                                                            </a>

                                                            <a href="#" name="{{ $post->title }}"
                                                               link="{{ url($backendUrl.'/pages/'.$post->id) }}"
                                                               class="deleteClick red id-btn-dialog2"
                                                               data-toggle="modal" data-target="#deleteModal">
                                                                <span class="btn btn-sm btn-danger">
                                                                    <i title="Delete" class="ace-icon fas fa-trash mr-0"></i>
                                                                </span>
                                                            </a>

                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="float-right" id="dynamic-table_paginate">
                                            {{$staticPage->links()}}
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
                                            <h5 class="modal-title" id="exampleModalLabel">Delete News</h5>
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
                        <!-- End Delete form-->


                        <!-- /.card-body -->
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
