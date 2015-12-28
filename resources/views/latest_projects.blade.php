<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Recently Added Projects</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <ul class="products-list product-list-in-box">
            @for($i =0 ; $i<6; $i++)
                <li class="item">
                    <div class="product-img">
                        <img src="{!! asset('uploads/no_img.jpg') !!}" alt="Product Image">
                    </div>
                    <div class="product-info">
                        <a href="javascript:;" class="product-title">Project 1
                            <span class="label label-warning pull-right">Kategoria test</span></a>
                            <span class="product-description">
                              Project fksdjfs fksjdfsd fskjfndsfs fsdkjfsd
                            </span>
                    </div>
                </li>
             @endfor
            </ul>
        </div>
    </div>