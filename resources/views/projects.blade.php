
        <ul class="users-list clearfix">
            @foreach($projects as $pro)
                <div class="col-lg-4 col-xs-6" >
                    <!-- small box -->
                    <div class="small-box custom-bg-projects" data-id="{!! $pro->project_id !!}">
                        <div class="inner">
                            <h4>{!! $pro->p_name !!}</h4>
                            <p data-id='{!! str_replace(" ","-",$pro->c_name) !!}' id="v_c_project">{!! $pro->c_name !!}</p>
                            <p data-id="{!! str_replace(" ","-",$pro->u_name) !!}" id="u_p_project">{!! $pro->u_name !!}</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-files-o"></i>
                        </div>
                        <div class="small-box-footer">
                            <div class="row">
                            <div class="col-sm-6">
                                <p>{!! $pro->downloads !!}</p>
                                <a href="{!! URL::route("download",array($pro->project_id)) !!}" style="text-decoration:none;color:white"><i id="d-ppp" data-id="{!! $pro->project_id !!}" class="fa fa-download"> Download</i></a>
                            </div>
                            <div class="col-sm-6">
                                <p id="l-p-i{!! $pro->project_id !!}">{!! $pro->likes !!}</p>
                                <i id="like-p" data-id="{!! $pro->project_id !!}" class="fa fa-thumbs-o-up"> @if($pro->l_user) Liked @else Like @endif</i>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- /.widget-user -->

                @endforeach
        </ul>
        <!-- /.users-list -->
    <!-- /.box-body -->
    <div class="box-footer text-center">
        <a href="javascript::" class="uppercase">View more</a>
    </div>
    <!-- /.box-footer -->

<!--/.box -->