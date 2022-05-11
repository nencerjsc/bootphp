@extends('System::backend.layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"> List group</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a
                                    href="{{ url(config('app.backendRoute').'/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">List group</li>
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
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title">List group</h3>
                            <div class="float-right" style="margin-right: 0px">
                                <a href="{{ url($backendUrl.'/groups/create') }}">
                                    <button class="btn btn-success"><i class="fa fa-plus-circle"></i> Create Group
                                    </button>
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ url($backendUrl.'/groups/actions') }}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="card-body" style="padding: 0;">
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
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Hideit</th>
                                            <th>Created at</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach( $groups as $group )
                                            <tr>
                                                <td class="center"><label class="pos-rel">
                                                        <input type="checkbox" class="ace mycheckbox"
                                                               value="{{ $group->id }}" name="check[]">
                                                        <span class="lbl"></span> </label>
                                                </td>
                                                <td>{{ $group->name }}</td>
                                                <td>{{ $group->description }}</td>
                                                <td>
                                                    <div data-table="user_groups" data-id="{{ $group->id }}"
                                                         data-col="status"
                                                         class="template-administrator24-switch Switch Round @if($group->status == 1) On @else Off @endif  ">
                                                        <input data-toggle="tooltip" name="default"
                                                               id="status"
                                                               @if($group->status == 1) value="status"
                                                               checked
                                                               @else value="" @endif
                                                               data-title-off="Off"
                                                               data-title-on="On "
                                                               type="checkbox" class="checkbox">
                                                        <div data-on="On" data-off="Off"
                                                             class="switch"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div data-table="user_groups" data-id="{{ $group->id }}"
                                                         data-col="hideit"
                                                         class="template-administrator24-switch Switch Round @if($group->hideit == 1) On @else Off @endif  ">
                                                        <input data-toggle="tooltip" name="default"
                                                               id="status"
                                                               @if($group->hideit == 1) value="hideit"
                                                               checked
                                                               @else value="" @endif
                                                               data-title-off="Off"
                                                               data-title-on="On "
                                                               type="checkbox" class="checkbox">
                                                        <div data-on="On" data-off="Off"
                                                             class="switch"></div>
                                                    </div>
                                                </td>
                                                <td>{{ $group->created_at }}</td>
                                                <td>
                                                    <div class="action-buttons">
                                                        <a href="{{ url($backendUrl.'/groups/'.$group->id.'/edit') }}">
                                                                <span class="btn btn-sm btn-info">
                                                                    <i title="Edit" class="ace-icon fas fa-pen mr-0"></i>
                                                                </span>
                                                        </a>
                                                        @if($group->id !== 1)
                                                            <a href="#" name="{{ $group->name }}"
                                                               link="{{ url($backendUrl.'/groups/'.$group->id) }}"
                                                               class="deleteClick red id-btn-dialog2"
                                                               data-toggle="modal" data-target="#deleteModal">
                                                                <span class="btn btn-sm btn-danger">
                                                                    <i title="Delete" class="ace-icon fas fa-trash mr-0"></i>
                                                                </span>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>


                                    </table>
                                </div>
                            </div>
                        </form>

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
                                            <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
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
        </section>
    </div>
@endsection

