<div class="input-group input-group-sm dataTables_filter">
    <form action="@if($action){{ $action }}@endif" name="formSearch" method="GET">
        <div class="input-group">
            @if(count($dataForm))
                @foreach($dataForm as $item)
                    {!! $item !!}
                @endforeach
            @endif
            <div class="input-group-append">
                <button type="submit" name="submit" value="filter" class="btn btn-warning mb-0"><i class="fa fa-search"></i>
                    Tìm kiếm
                </button>
                <button type="submit" name="submit" value="excel" class="btn btn-success mb-0"><i class="fa fa-download"></i>
                    Excel
                </button>
                <a class="btn btn-danger mb-0" href="{{ request()->url() }}"><i class="fa fa-trash"></i>
                    Bỏ lọc
                </a>
            </div>
        </div>
    </form>
</div>
