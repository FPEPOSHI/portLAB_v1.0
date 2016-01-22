
<!-- Modal -->
<div class="modal fade" id="d-project" tabindex="-1" role="dialog"
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
                    <p>Would you like to delete this project ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn">Cancel</button>
                    <a href="{!! URL::route("delete-p") !!}" class="btn btn-danger">OK</a>
                </div>
                <input type="hidden" value="" id="p-id-d-c"/>

                <!-- Modal Footer -->

            </div>
        </div>

    </div>



