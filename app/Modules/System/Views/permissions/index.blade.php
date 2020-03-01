@extends('layouts.app')

@section('css')
@endsection

@section('js')
@endsection

@section('content')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      @include('layouts.errors')
<div class="card">
  
  <div class="card-header" style="border-bottom: 0">
    <h3 class="card-title float-left">Danh sách</h3>
    <div class="float-right" style="margin-right: 150px">
      <a href="{{ route('permissions.create') }}"><button class="btn btn-success"><i class="fa fa-plus-circle"></i> Thêm quyền</button></a>
    </div>
    <div class="card-tools " >

      <div class="input-group input-group-sm dataTables_filter" style="width: 150px;">

        <form action="" name="formSearch" method="GET" >
          <input type="text" name="keyword" class="form-control float-right" placeholder="Search" style="padding-right: 42px;">
          <div class="input-group-append" style="margin-left: 110px">
            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
          </div>
        </form>
      </div>
    </div>

  </div>
  <!-- /.card-header -->
  <form action="{{ url('./permissions/actions') }}" method="POST">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="card-body" style="padding-top: 0;">
    <div class="row"><div class="col-sm-12">
    <table id="example1" class="table table-bordered table-striped dataTable">
      <thead>
        <tr>
          <th>Tên</th>
          <th>Mô tả</th>
          <th>Ngày tạo</th>
          <th>Hành động</th>
        </tr>
      </thead>  
      <tbody>
      
      @foreach( $permissions as $permission )
        <tr>

          <td>{{ $permission->name }}</td>
          <td>{{ $permission->description }}</td>
          <td>{{ $permission->created_at }}</td>
          <td>
            <div class="action-buttons">
             <a href="{{ url('permissions/'.$permission->id.'/edit') }}"><span class="btn btn-info btn-sm"> <i title="Sửa" class="ace-icon fa fa-pencil bigger-130"></i> </span></a>
              @can('delete')
             <a href="#" name="{{ $permission->name }}" link="{{ url('permissions/'.$permission->id) }}" class="deleteClick red id-btn-dialog2" data-toggle="modal" data-target="#deleteModal" ><span class="btn btn-danger btn-sm"> <i title="Delete" class="ace-icon fa fa-trash-o bigger-130"></i></span></a>
              @endcan
            </div>
          </td>
        </tr>
      @endforeach
      </tbody>
      
    
    </table>
  </div></div>
    <div class="row">
        <div class="col-sm-12">
          <div class="float-right" id="dynamic-table_paginate">
            <?php $permissions->setPath('roles'); ?>
             <?php echo $permissions->render(); ?>
          </div>
        </div>
      </div>
  </div></form>

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
            <h5 class="modal-title" id="exampleModalLabel">Delete Permission</h5>
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
@endsection