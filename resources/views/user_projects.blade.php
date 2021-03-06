<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">User projects</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <ul class="products-list product-list-in-box">
            @foreach($projects as $pro)
                <li class="item">
                    <div class="product-img">
                        <img src="{!! asset('uploads/no_img.jpg') !!}" alt="Product Image">
                    </div>
                    <div class="product-info">
                        <a href="" class="product-title">{!! $pro->p_name !!}</a>
                            <a href="{!! URL::route("bycategory", array(str_replace(" ","-",$pro->c_name))) !!}"><span class="label label-warning pull-right">{!! $pro->c_name !!}</span></a>
                            <span class="product-description">
                              {!! $pro->p_desc !!}
                            </span>
                        <div onclick="{!! "e_p(".$pro->project_id.")" !!}" class="btn btn-sm btn-danger pull-right"><span class="glyphicon glyphicon-pencil"></span> Edit</div>

                    </div>
                </li>

             @endforeach
            </ul>
        </div>
    </div>