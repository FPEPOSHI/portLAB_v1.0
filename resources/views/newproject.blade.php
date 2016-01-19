
<!-- Modal -->
<div class="modal fade" id="myproject" tabindex="-1" role="dialog"
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

                {!! Form::open(array('class'=> 'form-horizontal',"autocomplete" => "off","enctype"=>"multipart/form-data",'onsubmit'=>'return isFile()','id' => 'newprojectform','role' => 'form', 'route'=> 'newproject')) !!}

                <div class="form-group">
                        <label for="exampleTitle" class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control"
                               name="title" required="required" placeholder="Title"/>
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleDescription" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                        <textarea rows="5" class="form-control"
                               name="description" required="required" placeholder="Description"></textarea>
                            </div>
                    </div>
                    <div class="form-group" id="error-file-n-p">
                        <label for="exampleDescription" class="col-sm-2 control-label">Project</label>
                        <div class="col-sm-10">
                        <input type="file" class="form-control" id="id-projectfile"
                               name="projectfile" required="required" placeholder="Description"/>
                    </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"
                               for="Category" >Category</label>
                        <div class="col-sm-10">
                            <select name="category" class="form-control">
                                @foreach($category as $cat)
                                <option value="{!! $cat->category_id !!}">{!! $cat->name !!}</option>
                                @endforeach

                            </select>
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


