@extends("layout.profile")

@section('content')
    <div class="row">
    <div class="col-md-12">
        <!-- Widget: user widget style 1 -->
        <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-black" style="background: url('{!! asset("dist/img/photo1.png") !!}') center center;">
                <h3 class="widget-user-username">{!! $details[0]->name !!}</h3>
                <h5 class="widget-user-desc">{!! $details[0]->email !!}</h5>
            </div>
            <div class="widget-user-image">
                <img class="img-circle" src="{!! asset('uploads/'.$details[0]->photo)!!}" alt="User Avatar">
            </div>
            <div class="box-footer">
                <div class="row">
                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                            <h5 class="description-header">{!! count($projects) or 0 !!}</h5>
                            <span class="description-text">Projects</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                            <h5 class="description-header">{!! $usr_down or 0 !!}</h5>
                            <span class="description-text">Downloads</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4">
                        <div class="description-block">
                            <h5 class="description-header">{!! $usr_like or 0  !!}</h5>
                            <span class="description-text">Likes</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    </div>
                </div>
            </div>
    </div>
    </div>




@endsection