<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Specification</h5>

            </div>
            <form enctype="multipart/form-data" action="{{route('updateSpecification')}}" method="POST" id="editForm">
                {{ csrf_field() }}
                <div class="modal-body">

                    <div class="form-row">
                        <div class="col">
                            <select name="terminology_id" id="edit_terminology_id" class="mdb-select colorful-select dropdown-primary">
                                <option value="" >Select Terminology</option>

                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <div class="md-form mt-3">
                                <input type="text" id="edit_car_name" name="car_name" class="form-control" autocomplete="off">
                                <label for="edit_car_name" class="input-active">Car Name</label>
                            </div></div>

                        <div class="col">
                            <div class="md-form mt-3">
                                <input type="text" id="edit_model" name="model" class="form-control" autocomplete="off">
                                <label for="edit_model" class="input-active">Year Of model</label>
                            </div></div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <div class="md-form mt-3">
                                <input type="text" id="edit_price" name="price" class="form-control" autocomplete="off">
                                <label for="edit_price" class="input-active">Price</label>
                            </div></div>

                        <div class="col">
                            <div class="md-form mt-3">
                                <input type="text" id="edit_color" name="color" class="form-control" autocomplete="off">
                                <label for="edit_color" class="input-active">Color</label>
                            </div></div>

                        <div class="col">
                            <div class="md-form mt-3">
                                <input type="text" id="edit_milage" name="milage" class="form-control" autocomplete="off">
                                <label for="edit_milage" class="input-active">Milage</label>
                            </div></div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <div class="file-field" style="margin-top: 25px;">
                                <div class="btn-sm float-left" style="background-color: #a78a17!important; color: #fff!important;">
                                    <span>Choose file</span>
                                    <input type="file" name="photo" id="photo">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Upload Car Image">
                                </div>

                            </div>
                        </div>

                        <div class="col">
                            <div id="carImage"></div>
                        </div>
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
