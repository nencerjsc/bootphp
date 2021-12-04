<div style="padding-top: 15px">
    @if(request()->lang)
    <a href="{{ route('backend.language.setting') }}"><button class="btn btn-primary"><i class="ace-icon fa fa-home"></i> Ngôn ngữ</button></a>
    <a href="{{ route('backend.language.cache.filename',request()->lang) }} "><button class="btn btn-warning"><i class="ace-icon fa fa-save"></i> Xuất bản</button></a>
    <a href="{{ route('backend.language.syncLang') }}"><button class="btn btn-danger"><i class="ace-icon fa fa-refresh"></i> Đồng bộ</button></a>
    <a href="{{ url($backendUrl.'/language/key/'.request()->lang."/home") }}"><button class="btn btn-info"><i class="ace-icon fa fa-edit"></i> Thêm từ</button></a>
    @endif
</div>
