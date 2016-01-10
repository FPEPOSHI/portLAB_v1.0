
<!-- Modal -->
<div class="modal fade" id="e_sett" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    General Account Settings
                </h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">

                {!! Form::open(array('class'=> 'form-horizontal',"autocomplete" => "off","enctype"=>"multipart/form-data", 'id' => 'edit_settings','role' => 'form', 'route'=> 'edit_us')) !!}

                <div class="form-group">
                    <label for="exampleTitle" class="col-sm-2 control-label">Emri</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{!! $details_header[0]->name !!}"
                               name="emer" placeholder="Emer"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleDescription" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{!! $details_header[0]->email !!}"
                               name="email" placeholder="Email"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleDescription" class="col-sm-2 control-label">Foto</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" value="{!! $details_header[0]->photo !!}"
                               name="foto" placeholder="Foto"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleDescription" class="col-sm-2 control-label">Perdorues</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{!! $details_header[0]->username !!}"
                               name="username" placeholder="Username"/>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="submit" id="updatesett" class="btn btn-primary" >
                        Update
                    </button>
                </div>

                {!! Form::close() !!}


            </div>

            <!-- Modal Footer -->

        </div>
    </div>

     </div>



