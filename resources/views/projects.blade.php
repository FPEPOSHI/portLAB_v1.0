
        <ul class="users-list clearfix">
            @foreach($projects as $pro)
                <div class="col-lg-4 col-xs-6">
                    <!-- small box -->
                    <div class="small-box custom-bg-projects" data-id="{!! $pro->project_id !!}">
                        <div class="inner">
                            <h3>{!! $pro->p_name !!}</h3>
                            <p>{!! $pro->c_name !!}</p>
                            <p>{!! $pro->u_name !!}</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-files-o"></i>
                        </div>
                        <div class="small-box-footer">
                            <div class="row">
                            <div class="col-sm-6">
                                <p>{!! $pro->downloads !!}</p>
                                <i class="fa fa-download"></i>
                            </div>
                            <div class="col-sm-6">
                                <p>{!! $pro->likes !!}</p>
                                <i class="fa fa-thumbs-o-up"></i>
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