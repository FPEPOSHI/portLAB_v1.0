<div class="row">
    {{--<div class="col-md-2">--}}

    {{--</div>--}}
    <div class="col-md-9">
        <ol class="breadcrumb">
            {!! $map !!}
        </ol>
    </div>
    <div class="col-md-3">
        <div class="pull-right">
            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myproject">
                New project
            </button>
            @if($premium == 0)<button type="button" class="btn btn-danger  btn-lg  ">Premium</button>@endif
        </div>
    </div>
 </div>

@include('newproject')
