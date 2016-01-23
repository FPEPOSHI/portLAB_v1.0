<div id="a-p-s-d">
        <ul class="users-list clearfix" >
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
                                <a href="javascript: downPro({!! $pro->project_id !!})" style="text-decoration:none;color:white"><i id="d-ppp" data-id="{!! $pro->project_id !!}" class="fa fa-download"> Download</i></a>
                            </div>

                            <div class="col-sm-6">
                                <p id="l-p-i{!! $pro->project_id !!}">{!! $pro->likes !!}</p>
                                @if($pro->l_user)
                                <div id="like-p" data-id="{!! $pro->project_id !!}"><i id="like-p-{!! $pro->project_id !!}"  class="fa fa-thumbs-o-up">Liked</i></div>
                                @else
                                <div id="like-p"  data-id="{!! $pro->project_id !!}"><i id="like-p-{!! $pro->project_id !!}"  class="fa fa-thumbs-o-up">Like</i></div>
                                @endif
                            </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- /.widget-user -->

                @endforeach
        </ul>
    </div>
        <!-- /.users-list -->
    <!-- /.box-body -->
    <div class="box-footer text-center">
        <a href="javascript:viewMore()" class="uppercase">View more</a>
    </div>
    <!-- /.box-footer -->

<!--/.box -->