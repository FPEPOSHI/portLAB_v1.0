
<!-- Modal -->
<div class="modal fade" id="e_pass" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"> Password </h4>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">

                    {!! Form::open(array('class'=> 'form-horizontal',"autocomplete" => "off","enctype"=>"multipart/form-data", 'id' => 'pass','role' => 'form', 'route'=> 'edit_pass')) !!}


                    <div class="form-group">
                        <label for="pass" class="col-md-3 control-label">Password</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="pass" required="required" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="passs" class="col-md-3 control-label">New</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="pass1" required="required" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="passss" class="col-md-3 control-label">Retype new</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="pass2" required="required" placeholder="">
                        </div>
                    </div>

                        <button type="submit" id="passb" class="btn btn-primary" >
                            Update
                        </button>
                    </div>

                    {!! Form::close() !!}


                </div>

                <!-- Modal Footer -->

            </div>
        </div>

    </div>



