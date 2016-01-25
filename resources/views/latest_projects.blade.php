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
            @foreach($latest_pro as $pro)
                <li class="item">
                    <div class="product-img">
                        <img src="{!! asset('uploads/'.$pro->image) !!}" alt="Product Image">
                    </div>
                    <div class="product-info">
                        <a href="javascript:;" class="product-title">{!! $pro->p_name !!}</a>
                            <a href="{!! URL::route("bycategory", array(str_replace(" ","-",$pro->c_name))) !!}"><span class="label label-warning pull-right">{!! $pro->c_name !!}</span></a>
                            <span class="product-description">
                              {!! $pro->p_desc !!}
                            </span>
                    </div>
                </li>
             @endforeach
            </ul>
        </div>
    </div>