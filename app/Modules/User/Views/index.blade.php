@extends('layouts.backend')


@section('content')

    <div class="main-inner">
        <!-- *** Page title *** -->
        <div class="page-title">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner">
                        List user
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url(config('app.backendRoute').'/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">List user</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- *** Card table *** -->
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
                                            <a class="btn btn-info bg-gradient" href="softcard_orders.html">
                                                <i class="fal fa-home"></i>Home
                                            </a>
                                            <a class="btn btn-success bg-gradient" href="softcard_setting.html">
                                                <i class="fal fa-cog"></i> Setting
                                            </a>
                                            <a class="btn btn-secondary bg-gradient" href="{{ route('users.create') }}">
                                                <i class="fal fa-plus"></i>Create New User
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-right mt-3 mt-md-0">
                                            <form action="" class="form-inline justify-content-end shadow-none">
                                                <div class="row row-5">
                                                    <div class="col">
                                                        <select name="" class="form-control" id="">
                                                            <option value="-1">
                                                                --- Tìm theo ---
                                                            </option>
                                                            <option value="">
                                                                Tên sản phẩm
                                                            </option>
                                                            <option value="">
                                                                Trạng thái tắt
                                                            </option>
                                                            <option value="">
                                                                Trạng thái bật
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <input type="text" class="form-control" id=""
                                                               placeholder="Search">
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
                        {!! Form::open(array('route' => 'users.action.post','method'=>'post')) !!}
                        <div class="card-body">
                            <div class="card-title">
                                List User
                            </div>
                            <div class="table-responsive">
                                <table class="table thead-light">
                                    <thead>
                                    <tr>
                                        <th>
                                            <label class="form-check-label" for="checkall">
                                                <input type="checkbox" id="checkall"
                                                       class="form-check-input">
                                            </label>
                                        </th>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Roles</th>
                                        <th width="280px">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($data as $key => $user)
                                        <tr>
                                            <td>
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="check[]" value="{{$user->id}}"
                                                           class="form-check-input mycheckbox">
                                                </label>
                                            </td>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if(!empty($user->getRoleNames()))
                                                    @foreach($user->getRoleNames() as $v)
                                                        <label class="badge badge-success">{{ $v }}</label>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
{{--                                                <a class="btn btn-info"--}}
{{--                                                   href="{{ route('users.show',$user->id) }}">Show</a>--}}
                                                <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                                                <a href="#" name="{{ $user->name }}" link="{{ route("users.destroy",$user->id) }}"
                                                   class="deleteClick red id-btn-dialog2" data-toggle="modal"
                                                   data-target="#deleteModal"><span class="btn btn-danger">Delete</span></a>
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
                                        {{$data->appends(request()->query())->links()}}
                                    </div>
                                </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- *** End table *** -->
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
