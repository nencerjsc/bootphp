@extends('Backend::master')

@section('css')

@endsection
@section('js')
  @include('ckfinder::setup')
@endsection

@section('content')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="col-md-12">
            <!-- general form elements -->

           @include('Backend::layouts.errors')

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Sửa Seo meta</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              {!! Form::model($seo, ['method' => 'PATCH','route' => ['seo.update', $seo->id]]) !!}
                <div class="card-body row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="name">Url:</label>
                      <input name="link" type="text" class="form-control" id="link" placeholder="Copy Url muốn tạo vào đây: http://" value="{{ $seo->link }}" readonly>
                    </div>
                    <div class="form-group">
                      <label style="display:block">Ảnh đại diện của trang</label>
                      <div class="preview">
                        <img id="logo-icon" class="imgPreview" src="{{asset($seo->image)}}" />
                        <input type="hidden" name="image" id="image" class="inputImg"  value="" />
                      </div>
                      <button type="button" class="btn btn-primary" onclick="selectFileWithCKFinder('image', 'logo-icon')">Chọn ảnh</button>
                    </div>

                    <div class="form-group">
                      <label for="lang">Ngôn ngữ:</label>
                      <select class="form-control" name="lang">
                        @foreach($langs as $lang)
                          <option value="{{$lang->code}}" @if($lang->code == $seo->lang) selected @endif>{{$lang->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="title">Tiêu đề SEO:</label>
                      <input name="meta[title]" type="text" class="form-control" placeholder="Tối đa 64 ký tự" value="{{ $seo->meta['title'] }}" required>
                    </div>
                    <div class="form-group">
                      <label for="description">Mô tả SEO:</label>
                      <textarea name="meta[description]" class="form-control" required>{{ $seo->meta['description'] }}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="keyword">Từ khóa SEO:</label>
                      <input name="meta[keyword]" type="text" class="form-control" value="{{ $seo->meta['keyword'] }}" required>
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
