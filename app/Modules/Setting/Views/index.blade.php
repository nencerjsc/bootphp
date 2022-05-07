@extends('System::backend.layouts.master')

@section('content')
    <script src="{{ asset('adminlte/plugins/ckeditor4101/ckeditor.js') }}"></script>
    <script>
        $(function () {
            CKEDITOR.replace('description', {
                filebrowserBrowseUrl: '{{ url(env('BACKEND_URI').'/ckfinderpopup') }}',
                filebrowserImageBrowseUrl: '{{ url(env('BACKEND_URI').'/ckfinderpopup') }}',
                filebrowserFlashBrowseUrl: '{{ url(env('BACKEND_URI').'/ckfinderpopup') }}',
            });
            CKEDITOR.config.extraPlugins = 'justify , colorbutton';
        });
    </script>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"> {{ $title }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a
                                    href="{{ url(config('app.backendRoute').'/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">{{ $title }}</li>
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
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="card-title">
                                        <i class="fa fa-cogs"></i>
                                        List settings
                                    </h3>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-left">
                                        <a class="btn btn-success bg-gradient float-right"
                                           href="{{ route('setting.create.key') }}">
                                            <i class="fas fa-plus mr-1"></i>Create Key
                                        </a>
                                        <a class="btn btn-danger bg-gradient float-right mr-2"
                                           href="{{ route('setting.clear.cache') }}">
                                            <i class="fas fa-trash mr-1"></i>Clear Cache
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="tab-content" id="custom-content-below-tabContent" style="padding-top: 25px">
                                <div class="tab-pane fade active show" id="custom-content-below-home" role="tabpanel"
                                     aria-labelledby="custom-content-below-home-tab">
                                    <form action="{{route('settings.store')}}" method="POST"
                                          enctype="multipart/form-data">

                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="col-md-4 float-left text-center"
                                                     style="display: inline-block">
                                                    <div class="form-group">
                                                        <div class="preview">
                                                            <img id="favicon-icon" class="imgPreview"
                                                                 src="{{ asset($setting['favicon'])}}"/>
                                                            <input type="hidden" name="favicon" id="favicon"
                                                                   class="inputImg" value="{{ asset($setting['favicon'])}}"/>
                                                        </div>
                                                        <button type="button" class="btn btn-primary"
                                                                onclick="selectFileWithCKFinder('favicon', 'favicon-icon')">
                                                            Chọn ảnh
                                                        </button>
                                                    </div>
                                                    <label style="display:block">Favicon Icon</label>
                                                </div>

                                                <div class="col-md-4 float-left text-center" style="display: inline-block">
                                                    <div class="form-group">
                                                        <div class="preview">
                                                            <img id="logo-icon" class="imgPreview" src="{{ asset($setting['logo']) }}"/>
                                                            <input type="hidden" name="logo" id="logo" class="inputImg" value="{{ asset($setting['logo']) }}"/>
                                                        </div>
                                                        <button type="button" class="btn btn-primary" onclick="selectFileWithCKFinder('logo', 'logo-icon')">
                                                            Chọn ảnh
                                                        </button>
                                                    </div>
                                                    <label style="display:block">Website Logo</label>
                                                </div>
                                                <div class="col-md-4 float-left text-center" style="display: inline-block">
                                                    <div class="form-group">
                                                        <div class="preview">
                                                            <img id="backendlogo-icon" class="imgPreview" src="{{ asset($setting['backendlogo']) }}"/>
                                                            <input type="hidden" name="backendlogo" id="backendlogo" class="inputImg"
                                                                   value="{{ asset($setting['backendlogo']) }}"/>
                                                        </div>
                                                        <button type="button" class="btn btn-primary"
                                                                onclick="selectFileWithCKFinder('backendlogo', 'backendlogo-icon')">
                                                            Chọn ảnh
                                                        </button>
                                                    </div>
                                                    <label style="display:block">Backend Logo</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <table class="table table-striped">
                                                    <tbody>
                                                    <tr>
                                                        <td>{{__('setting.company_name')}}</td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input type="text" name="company_name"
                                                                       class="form-control"
                                                                       value="{{ $setting['company_name']}}">
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>{{__('setting.company_shortname')}}</td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input type="text" name="company_shortname"
                                                                       class="form-control"
                                                                       value="{{ $setting['company_shortname']}}">
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>{{__('setting.company_description')}}</td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input type="text" name="company_description"
                                                                       class="form-control" value="{{ $setting['company_description']}}">
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>{{__('setting.company_address')}}</td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="text" name="company_address"
                                                                       class="form-control"
                                                                       value="{{ $setting['company_address']}}">
                                                            </div>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>Email</td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input type="email" name="email" class="form-control"
                                                                       value="{{ $setting['email'] }}">
                                                            </div>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>Phone</td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input type="text" name="phone" class="form-control"
                                                                       value="{{ $setting['phone'] }}">
                                                            </div>
                                                        </td>

                                                    </tr>

                                                    <tr>
                                                        <td>Hotline</td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input type="text" name="hotline" class="form-control"
                                                                       value="{{ $setting['hotline'] }}">
                                                            </div>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>Facebook</td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input type="text" name="facebook" class="form-control"
                                                                       value="{{ $setting['facebook']}}">
                                                            </div>
                                                        </td>

                                                    </tr>

                                                    <tr>
                                                        <td>Twitter</td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input type="text" name="twitter" class="form-control"
                                                                       value="{{ $setting['twitter']}}">
                                                            </div>
                                                        </td>

                                                    </tr>

                                                    <tr>
                                                        <td>Youtube</td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input type="text" name="youtube" class="form-control"
                                                                       value="{{ $setting['youtube']}}">
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Telegram</td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input type="text" name="telegram" class="form-control"
                                                                       value="{{ $setting['telegram'] }}">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @if($additionals && count($additionals))
                                                        @foreach($additionals as $key => $additional)
                                                            <tr>
                                                                <td>{{__('settings.'.$key)}}</td>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <input type="text" name="{{ $key }}"
                                                                               class="form-control"
                                                                               value="{{ $additional }}">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-6">
                                                <table class="table table-striped ">
                                                    <tbody>
                                                    <tr>
                                                        <td>{{ __('setting.language') }}:</td>
                                                        <td>
                                                            <div class="form-group">
                                                                <select class="form-control" name="language">
                                                                    @if(count($languages) > 0)
                                                                        @foreach($languages as $lang)
                                                                            <option value="{{$lang['code']}}"
                                                                                    @if($lang['code'] == $setting['language']) selected @endif>
                                                                                {{$lang['name']}}
                                                                            </option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>

                                                            </div>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>Copyright</td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input type="text" name="copyright" class="form-control"
                                                                       value="{{ $setting['copyright'] }}">
                                                            </div>
                                                        </td>

                                                    </tr>


                                                    <tr>
                                                        <td>{{__('setting.timezone')}}</td>
                                                        <td>
                                                            <div class="form-group">
                                                                {!! Form::select('timezone', $timezone,$setting['timezone'], array('class' => 'form-control select2')) !!}
                                                            </div>
                                                        </td>

                                                    </tr>

                                                    <tr>
                                                        <td>{{ __('setting.websitestatus') }}:</td>
                                                        <td>
                                                            <div class="form-group">
                                                                <select class="form-control" name="websitestatus"
                                                                        id="websitestatus">
                                                                    <option value="ONLINE"
                                                                            @if($setting['websitestatus'] == 'ONLINE') selected="selected" @endif >
                                                                        ONLINE
                                                                    </option>
                                                                    <option value="OFFLINE"
                                                                            @if($setting['websitestatus'] == 'OFFLINE') selected="selected" @endif>
                                                                        OFFLINE
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>{{__('setting.offline_mes')}}:</td>
                                                        <td>
                                                            <div class="form-group">
                                                <textarea name="offline_mes"
                                                          class="form-control">{{$setting['offline_mes']}}</textarea>
                                                            </div>
                                                        </td>

                                                    </tr>

                                                    <tr>
                                                        <td>{{__('setting.globalpopup')}}</td>
                                                        <td>
                                                            <div class="input-group">

                                                                <select class="form-control" name="globalpopup"
                                                                        id="globalpopup">

                                                                    <option value="0"
                                                                            @if(isset($setting['globalpopup']) && $setting['globalpopup'] == 0) selected="selected" @endif >
                                                                        Tắt
                                                                    </option>
                                                                    <option value="1"
                                                                            @if(isset($setting['globalpopup']) && $setting['globalpopup'] == 1) selected="selected" @endif >
                                                                        Bật
                                                                    </option>

                                                                </select>

                                                            </div>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('setting.header_js') }}</td>
                                                        <td>
                                                            <div class="form-group">
                                                            <textarea id="header_js" name="header_js"
                                                                      class="form-control"
                                                                      placeholder="{{ __('setting.header_js') }}">{{$setting['header_js']}}</textarea>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('setting.header_js') }}</td>
                                                        <td>
                                                            <div class="form-group">
                                                            <textarea id="footer_js" name="footer_js"
                                                                      class="form-control"
                                                                      placeholder="{{ __('setting.footer_js') }}">{{$setting['footer_js']}}</textarea>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <div class="form-group">
                                                            <textarea id="description" name="globalpopup_mes"
                                                                      class="form-control"
                                                                      placeholder="{{__('setting.globalpopup_mes')}}">{{$setting['globalpopup_mes']}}</textarea>
                                                            </div>
                                                        </td>

                                                    </tr>


                                                    </tbody>
                                                </table>

                                            </div>

                                            <div class="input-group">
                                                <button class="btn btn-primary btn-lg">Lưu cấu hình</button>
                                            </div>

                                        </div>
                                        {!! csrf_field() !!}
                                    </form>
                                </div>
                            </div>
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
    </div>
@endsection
