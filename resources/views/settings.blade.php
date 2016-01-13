<div class="row" id="settings">
    <div class="col-md-8">
        <div class="container"><h2>Information </h2></div>
        <div id="exTab3" class="container">
            <ul  class="nav nav-pills">
                <li class="active">
                    <a  href="#1b" data-toggle="tab">Ndrysho informacione</a>
                </li>
                <li><a href="#2b" data-toggle="tab">Ndrysho fjalekalim</a>
                </li>
            </ul>
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="edit">
                    Te dhena
                </h4>
            </div>
        </div>
    </div>
</div>

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
                    New Project
                </h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">

                {!! Form::open(array('class'=> 'form-horizontal',"autocomplete" => "off","enctype"=>"multipart/form-data", 'id' => 'newprojectform','role' => 'form', 'route'=> 'newproject')) !!}

                <div class="form-group">
                    <label for="exampleTitle" class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"
                               name="title" placeholder="Title"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleDescription" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"
                               name="description" placeholder="Description"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleDescription" class="col-sm-2 control-label">Project</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control"
                               name="projectfile" placeholder="Description"/>
                    </div>
                </div>

                <div class="modal-footer">

                    <button type="submit" id="send" class="btn btn-primary" >
                        Send
                    </button>
                </div>

                {!! Form::close() !!}


            </div>

            <!-- Modal Footer -->

        </div>
    </div>
</div>


