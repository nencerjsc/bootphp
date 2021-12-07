@extends('layouts.backend')

@section('content')
    <div class="main-inner">
        <!-- *** Page title *** -->
        <div class="page-title">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner">
                        List news
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{ url(config('app.backendRoute').'/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">List news</li>
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
                        <div class="card-header pb-0 border-0 bg-transparent rounded-0">
                            <!-- *** List button & form inline *** -->
                            <div class="list-button mt-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="text-left">
                                            <a class="btn btn-success bg-gradient"
                                               href="{{ url($backendUrl.'/news/create') }}">
                                                <i class="fal fa-plus"></i>Create News
                                            </a>
                                            <a class="btn btn-info bg-gradient"
                                               href="{{ route('news_cat.index') }}">
                                                <i class="fal fa-plus"></i>Danh mục
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-right mt-3 mt-md-0">
                                            <form action="" class="form-inline justify-content-end shadow-none">
                                                <div class="row row-5">
                                                    <div class="col">
                                                        <input type="text" name="keyword"
                                                               class="form-control float-right" placeholder="Search"
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
                                        <th class="center sorting_disabled" rowspan="1" colspan="1" aria-label="">
                                            <label class="pos-rel">
                                                <input type="checkbox" class="ace" id="checkall">
                                                <span class="lbl"></span> </label>
                                        </th>
                                        <th>Avatar</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Language</th>
                                        <th>Status</th>
                                        <th>View</th>
                                        <th>Update at</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach( $news as $post )
                                        <tr>
                                            <td class="center"><label class="pos-rel">
                                                    <input type="checkbox" class="ace mycheckbox"
                                                           value="{{ $post->id }}" name="check[]">
                                                    <span class="lbl"></span> </label>
                                            </td>
                                            <td><img src="{{ asset($post->image) }}" width="80" height="70"></td>
                                            <td><a href="{{url('news/'.$post->news_slug)}}.html" target="_blank">{{ $post->title }}</a></td>
                                            <td>{{ $post->author }}</td>
                                            <td>{{ $post->language }}</td>
                                            <td>
                                                <div data-table="news" data-id="{{ $post->id }}" data-col="status"
                                                     class="template-administrator24-switch Switch Round @if($post->status == 1) On @else Off @endif  ">
                                                    <input data-toggle="tooltip" name="default" id="status" @if($post->status == 1) value="status" checked @else value="" @endif
                                                    data-title-off="Đã tắt" data-title-on="Đã bật " type="checkbox" class="checkbox">
                                                    <div data-on="On" data-off="Off" class="switch"></div>
                                                </div>
                                            </td>

                                            <td>{{ $post->view_count }}</td>
                                            <td>{{ $post->created_at }}</td>
                                            <td>
                                                <div class="action-buttons">
                                                    <a href="{{ url($backendUrl.'/news/'.$post->id.'/edit') }}">
                                                        <span class="btn btn-sm btn-warning"> <i title="Sửa" class="ace-icon fa fa-pencil mr-0"></i> </span>
                                                    </a>
                                                    <a href="#" name="{{ $post->title }}" link="{{ url($backendUrl.'/news/'.$post->id) }}"
                                                       class="deleteClick red id-btn-dialog2" data-toggle="modal"
                                                       data-target="#deleteModal"><span class="btn btn-sm btn-danger"><i title="Delete" class="ace-icon fa fa-trash mr-0"></i></span></a>
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
                                                    <option value="-1"> Action </option>
                                                    <option value=""> Delete </option>
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
                                    {{ $news->appends(request()->query())->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete form -->
    <script type="text/javascript">
        $(document).ready(function(){
            $(".deleteClick").click(function(){
                var link = $(this).attr('link');
                var name = $(this).attr('name');
                $("#deleteForm").attr('action',link);
                $("#deleteMes").html("Delete : "+name+" ?");
            });
        });
    </script>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="deleteForm" action="" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Slider</h5>
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
                    <input type="hidden" name="_method" value="delete" />
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>


@endsection
