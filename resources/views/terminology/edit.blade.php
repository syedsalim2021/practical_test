<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Terminology</h5>

            </div>
            <form enctype="multipart/form-data" action="{{route('updateTerminology')}}" method="POST" id="editForm">
                {{ csrf_field() }}
                <div class="modal-body">

                    <div class="form-row">
                        <div class="col">
                            <div class="md-form mt-3">
                                <input type="text" id="edit_name" name="name" class="form-control" autocomplete="off">
                                <label for="edit_name" class="input-active">Terminology Name</label>
                            </div></div>
                    </div>


                    <br>
                    <div class="form-row">
                        <div class="col">
                            <button class="btn btn-info btn-block" id="editBtn" type="submit">Update</button>
                        </div>
                        <div class="col">
                            <button class="btn btn-info btn-block" type="reset">Reset</button>
                        </div>
                        <div class="col">
                        <button class="btn btn-info btn-block" type="button" data-dismiss="modal" aria-label="Close">Close</button>
                    </div>
                    </div>
                </div>
            </form>


        </div>
    </div>
</div>
