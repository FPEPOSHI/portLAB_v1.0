
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

                <form role="form" class="form-horizontal">
                    <div class="form-group">
                        <label for="exampleTitle" class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control"
                               id="exampleTitle" placeholder="Title"/>
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleDescription" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control"
                               id="exampleDescription" placeholder="Description"/>
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleDescription" class="col-sm-2 control-label">Project</label>
                        <div class="col-sm-10">
                        <input type="file" class="form-control"
                               id="exampleDescription" placeholder="Description"/>
                    </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"
                               for="Category" >Category</label>
                        <div class="col-sm-10">
                            <select name="Category" class="form-control">
                                <option value="1">Programming</option>
                                <option value="2">Economy</option>
                                <option value="3">Social Science</option>
                            </select>
                        </div>
                    </div>


                </form>


            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">

                <button type="button" class="btn btn-primary">
                    Upload
                </button>
            </div>
        </div>
    </div>
</div>


