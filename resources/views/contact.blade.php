<div class="container">
    <div class="row">
        {{--<div class="col-md-12">--}}
            {{--<small><i></i>Add alerts if form ok... success, else error.</i></small>--}}
            {{--<div class="alert alert-success"><strong><span class="glyphicon glyphicon-send"></span> Success! Message sent. (If form ok!)</strong></div>--}}
            {{--<div class="alert alert-danger"><span class="glyphicon glyphicon-alert"></span><strong> Error! Please check the inputs. (If form error!)</strong></div>--}}
        {{--</div>--}}
        <div class="col-md-1">
        </div>
            {!! Form::open(array("role" => 'form', 'route'=>'contact','method'=>'get')) !!}
            <div class="col-md-10">
                <div class="form-group">
                    <label for="InputName">Emri</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="InputName" id="InputName" placeholder="emri juaj" required>
                        <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Email</label>
                    <div class="input-group">
                        <input type="email" class="form-control" id="InputEmail" name="InputEmail" placeholder="adresa e email" required  >
                        <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
                </div>
                <div class="form-group">
                    <label for="InputMessage">Mesazh</label>
                    <div class="input-group"
                            >
                        <textarea name="InputMessage" id="InputMessage" class="form-control" rows="5" required></textarea>
                        <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
                </div>

                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
            </div>
        {!! Form::close() !!}
        <div class="col-md-1">
        </div>
    </div>

</div>