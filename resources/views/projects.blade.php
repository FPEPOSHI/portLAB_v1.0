
        <ul class="users-list clearfix">
            @for($i=0;$i<13;$i++)
                <div class="col-lg-4 col-xs-6">
                    <!-- small box -->
                    <div class="small-box custom-bg-projects">
                        <div class="inner">
                            <h3>Emri i projektit</h3>
                            <p>Kategoria e projektit</p>
                            <p>Pronari i projektit</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-files-o"></i>
                        </div>
                        <div class="small-box-footer">
                            <div class="row">
                            <div class="col-sm-6">
                                <p>Downloads</p>
                                <i class="fa fa-download"></i>
                            </div>
                            <div class="col-sm-6">
                                <p>Like</p>
                                <i class="fa fa-thumbs-o-up"></i>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.widget-user -->

                @endfor
        </ul>
        <!-- /.users-list -->
    <!-- /.box-body -->
    <div class="box-footer text-center">
        <a href="javascript::" class="uppercase">View more</a>
    </div>
    <!-- /.box-footer -->

<!--/.box -->