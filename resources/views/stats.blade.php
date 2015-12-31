<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Statistics</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            {{--<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>--}}
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="info-box bg-blue">
                            <span class="info-box-icon"><i class="fa fa-user"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Members</span>
                                <span class="info-box-number">{!! $total_users or "10"!!}</span>
                                <!-- The progress section is optional -->
                                <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>
                            <span class="progress-description">
                              70% Increase in 30 Days
                            </span>
                            </div>
                        </div>
        <div class="info-box bg-orange">
            <span class="info-box-icon"><i class="fa fa-files-o"></i></span>
                <div class="info-box-content">
                <span class="info-box-text">Projects</span>
                <span class="info-box-number">{!! $total_projects !!}</span>
                <!-- The progress section is optional -->
                    <div class="progress">
                    <div class="progress-bar" style="width: 70%"></div>
                    </div>
                <span class="progress-description">
                70% Increase in 30 Days
                </span>
            </div>
        </div>

        <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-download"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Downloads</span>
                <span class="info-box-number">{!! $total_downloads !!}</span>
                <!-- The progress section is optional -->
                <div class="progress">
                    <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                  70% Increase in 30 Days
                </span>
            </div>
        </div>
        <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Likes</span>
                <span class="info-box-number">{!! $total_likes !!}</span>
                <!-- The progress section is optional -->
                <div class="progress">
                    <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                  70% Increase in 30 Days
                </span>
            </div>
        </div>
    </div>

</div>