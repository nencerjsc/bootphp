<input class="form-control" value="@if(request()->input("$col")){{ trim(request()->input("$col"))}}@else{{ trim(date('d-m-Y', time()))}}@endif" name="{{$col}}" type="date">
