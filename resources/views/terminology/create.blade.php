<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Terminology</h5>

            </div>
            <form action="{{route('addTerminology')}}" method="POST" id="InsertForm">
                {{ csrf_field() }}

                <div class="modal-body">
                    <div class="form-row">
                        <div class="col">
                            <div class="md-form mt-3">
                                <input type="text" id="name" name="name" class="form-control" autocomplete="off">
                                <label for="name">Terminology Name</label>
                            </div></div>
                    </div>

                    <br>
                    <div class="form-row">
                        <div class="col">
                            <button class="btn btn-info btn-block" name="submitBtn" id="submitBtn" type="submit">Add</button>
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
