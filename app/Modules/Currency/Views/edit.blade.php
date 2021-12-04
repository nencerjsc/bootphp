@extends('layouts.backend')

@section('content')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="col-md-12">
            <!-- general form elements -->
          

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Sửa tiền tệ</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              {!! Form::model($currency, ['method' => 'PATCH','route' => ['currencies.update', $currency->id]]) !!}
                <div class="card-body row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="name">Tên:</label>
                      <input name="name" type="text" class="form-control" id="name" placeholder="Name" value="{{ $currency->name}}" >
                    </div>
                    <div class="form-group">
                      <label for="code">Mã:</label>
                      {!! Form::select('code',$lsCurrency,$currency->code, array('class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                      <label for="decimal">Số thập phân:</label>
                      <input name="decimal" type="text" class="form-control" id="decimal" placeholder="Enter Decimal" value="{{ $currency->decimal}}">
                    </div>

                    <div class="form-group">
                      <label for="symbol_left">Ký hiệu trái:</label>
                      <input name="symbol_left" type="text" class="form-control" id="url" placeholder="Enter Symbol Left" value="{{ $currency->symbol_left}}">
                    </div>

                    <div class="form-group">
                      <label for="symbol_right">Ký hiệu phải:</label>
                      <input name="symbol_right" type="text" class="form-control" id="symbol_right" placeholder="Enter Symbol Right" value="{{ $currency->symbol_right}}">
                    </div>
                    <div class="form-group">
                      <label for="wallet_admin_balance">Số dư tối đa ví Admin:</label>
                      <input name="wallet_admin_balance" type="text" class="form-control" id="wallet_admin_balance" value="{{ $currency->wallet_admin_balance}}">
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="value">Giá của 1 USD:</label>
                      <input name="value" type="text" class="form-control" id="value" placeholder="Enter rate USD" value="{{ $currency->value}}">
                    </div>
                    <div class="form-group">
                      <label for="seperator">Dấu hàng nghìn:</label>
                      {!! Form::select('seperator', array('comma'=>'Comma','space'=>'Space','dot'=>'Dot'),$currency->seperator, array('class' => 'form-control')) !!}
                    </div>

                    <div class="form-group">
                      <label for="sort">Sắp xếp:</label>
                      <input name="sort" type="text" class="form-control" id="sort" placeholder="Enter Sort" value="{{ $currency->sort}}">
                    </div>

                    <div class="form-group">
                      <label for="fiat">Tiền tệ Fiat:</label>
                      <input name="fiat" type="checkbox" value="fiat" data-toggle="toggle" style="display: none;" @if( $currency->fiat == 1 ) checked="checked" @endif>
                        <div class="Switch Round" style="vertical-align:top;margin-left:10px;">
                            <div class="Toggle"></div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="wallet">Tạo ví bằng tiền tệ này:</label>
                      <input name="wallet" type="checkbox" value="wallet" data-toggle="toggle" style="display: none;" @if( $currency->wallet == 1 ) checked="checked" @endif>
                      <div class="Switch Round" style="vertical-align:top;margin-left:10px;">
                        <div class="Toggle"></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="homepage">Hiện trang chủ:</label>
                        <input name="homepage" id="homepage" type="checkbox" value="homepage" data-toggle="toggle" style="display: none;" @if( $currency->homepage == 1 ) checked="checked" @endif>
                        <div class="Switch Round" style="vertical-align:top;margin-left:10px;">
                            <div class="Toggle"></div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="default">Tiền mặc định:</label>
                        <input name="default" id="default" type="checkbox" value="default" data-toggle="toggle" style="display: none;" @if( $currency->default == 1 ) checked="checked" @endif>
                        <div class="Switch Round" style="vertical-align:top;margin-left:10px;">
                            <div class="Toggle"></div>
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="status">Trạng thái:</label>
                        <input name="status" id="status" type="checkbox" value="status" data-toggle="toggle" style="display: none;" checked="checked">
                        <div class="Switch Round On" style="vertical-align:top;margin-left:10px;">
                            <div class="Toggle"></div>
                        </div>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.card -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
    <!-- /.card -->
    </div>
  <!-- /.col -->
  </div>
<!-- /.row -->
</section>
<!-- /.content -->
@endsection
