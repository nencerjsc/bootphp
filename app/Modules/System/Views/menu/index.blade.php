@extends('System::backend.layouts.master')
@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"> List menu</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a
                                    href="{{ url(config('app.backendRoute').'/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">List menu</li>
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
                                        <!-- *** List button & form inline *** -->
                                        <div class="list-button mt-0">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="text-left">
                                                        <a class="btn btn-success bg-gradient"
                                                           href="{{ url($backendUrl.'/menu/create') }}">
                                                            <i class="fas fa-plus mr-1"></i>Create News
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="text-right mt-3 mt-md-0">
                                                        <form action=""
                                                              class="form-inline justify-content-end shadow-none">
                                                            <div class="row row-5">
                                                                <div class="col">
                                                                    <select class="form-control float-right" name="language" style="min-width: 234px">
                                                                        @if($langs->count())
                                                                            @foreach($langs as $lang)
                                                                                <option value="{{ $lang->code }}" @if(request()->input("language")== $lang->code) selected="selected" @endif>{{ $lang->name }}</option>
                                                                                @endforeach
                                                                            @endif
                                                                    </select>
                                                                </div>
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
                                            News
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
                                                    <th>Url</th>
                                                    <th>Type</th>
                                                    <th>Language</th>
                                                    <th>Status</th>
                                                    <th>Update at</th>
                                                    <th>Action</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(!count($menus))
                                                    <tr>
                                                        <td colspan="10" class="text-center">Empty data !!!</td>
                                                    </tr>
                                                @else
                                                    @foreach( $menus as $post )
                                                        <tr>
                                                            <td class="center"><label class="pos-rel">
                                                                    <input type="checkbox" class="ace mycheckbox"
                                                                           value="{{ $post->id }}" name="check[]">
                                                                    <span class="lbl"></span> </label>
                                                            </td>
                                                            <td>{{ $post->id }}
                                                            </td>
                                                            <td>{{ $post->name }}</td>
                                                            <td>{{ $post->url }}</td>
                                                            <td>{{ $post->menu_type }}</td>
                                                            <td>{{ $post->language }}</td>
                                                            <td>
                                                                <div data-table="menu" data-id="{{ $post->id }}"
                                                                     data-col="status"
                                                                     class="template-administrator24-switch Switch Round @if($post->status == 1) On @else Off @endif  ">
                                                                    <input data-toggle="tooltip" name="default"
                                                                           id="status"
                                                                           @if($post->status == 1) value="status"
                                                                           checked
                                                                           @else value="" @endif
                                                                           data-title-off="Đã tắt"
                                                                           data-title-on="Đã bật "
                                                                           type="checkbox" class="checkbox">
                                                                    <div data-on="On" data-off="Off"
                                                                         class="switch"></div>
                                                                </div>
                                                            </td>
                                                            <td>{{ $post->created_at }}</td>
                                                            <td>
                                                                <div class="action-buttons">
                                                                    <a href="{{ url($backendUrl.'/menu/'.$post->id.'/edit') }}">
                                                                    <span class="btn btn-sm btn-warning"> <i title="Edit"
                                                                                                             class="ace-icon fas fa-pen mr-0"></i> </span>
                                                                    </a>
                                                                    <a href="#" name="{{ $post->name }}"
                                                                       link="{{ url($backendUrl.'/menu/'.$post->id) }}"
                                                                       class="deleteClick red id-btn-dialog2"
                                                                       data-toggle="modal"
                                                                       data-target="#deleteModal"><span
                                                                            class="btn btn-sm btn-danger"><i
                                                                                title="Delete"
                                                                                class="ace-icon fas fa-trash mr-0"></i></span></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
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
                                                                <option value="-1"> Action</option>
                                                                <option value=""> Delete</option>
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
                                                {{ $menus->appends(request()->query())->links() }}
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

@endsection
