<div class="input-group input-group-sm dataTables_filter">
    <form action="@if($action){{ $action }}@endif" name="formSearch" method="GET">
        <div class="input-group">
            @if(count($dataForm))
                @foreach($dataForm as $item)
                    {!! $item !!}
                @endforeach
            @endif
            <div class="input-group-append">
                <button class="btn btn-success template-1-btn" type="submit" name="submit" value="filter">
                    <span class="fal fa-search"></span>
                </button>
                <button class="btn-action text-nowrap btn-excel ml-2" type="submit" name="submit" value="excel">
                    <i class="fas fa-file-excel"></i>
                    Excel
                </button>
            </div>
        </div>
    </form>
</div>
