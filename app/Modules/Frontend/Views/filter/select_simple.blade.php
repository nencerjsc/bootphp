<select name="{{$col}}" class="form-control">
    @if($default_value)
        <option value="{{$default_value}}" selected="selected">{{ __('order.'.$default_value) }}</option>
    @else
        <option value=""
                @if(request()->input("$col")=="") selected="selected" @endif>{{ __('order.choose_'.$col) }}</option>
        @if(count($data))
            @foreach($data as $value)
                <option value="{{$value}}"
                        @if(request()->input("$col")=="$value") selected="selected" @endif>{{ __('order.'.$value)}}</option>
            @endforeach
        @endif
    @endif

</select>