<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Specification</h5>

            </div>
            <form action="{{route('addSpecification')}}" method="POST" id="InsertForm">
                {{ csrf_field() }}

                <div class="modal-body">

                    <div class="form-row">
                        <div class="col">
                            <select name="terminology_id" id="terminology_id" class="mdb-select colorful-select dropdown-primary">
                                <option value="" >Select Terminology</option>
                                @php
                                    $terminologies=DB::table('terminologies')->select('id','name')->get();
                                @endphp

                                @foreach($terminologies as $terminology)
                                    <option value="{{$terminology->id}}">{{$terminology->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <div class="md-form mt-3">
                                <input type="text" id="car_name" name="car_name" class="form-control" autocomplete="off">
                                <label for="car_name">Car Name</label>
                            </div></div>

                        <div class="col">
                            <div class="md-form mt-3">
                                <input type="text" id="model" name="model" class="form-control" autocomplete="off">
                                <label for="model">Year Of model</label>
                            </div></div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <div class="md-form mt-3">
                                <input type="text" id="price" name="price" class="form-control" autocomplete="off">
                                <label for="price">Price</label>
                            </div></div>

                        <div class="col">
                            <div class="md-form mt-3">
                                <input type="text" id="color" name="color" class="form-control" autocomplete="off">
                                <label for="color">Color</label>
                            </div></div>

                        <div class="col">
                            <div class="md-form mt-3">
                                <input type="text" id="milage" name="milage" class="form-control" autocomplete="off">
                                <label for="milage">Milage</label>
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



<!--Modal: modalVM-->
<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">

        <div class="modal-content">
            <div class="modal-body mx-3">
                <form class="text-center" style="color: #757575;" action="{{route('searchSpecification')}}" method="POST" id="searchCarForm">
                {{csrf_field()}}
                <!-- Name -->
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="col">
                                <select name="terminology_id" id="terminology_id" class="mdb-select colorful-select dropdown-primary">
                                    <option value="" >Select Terminology</option>
                                    @php
                                        $terminologies=DB::table('terminologies')->select('id','name')->get();
                                    @endphp

                                    @foreach($terminologies as $terminology)
                                        <option value="{{$terminology->id}}">{{$terminology->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="col">
                                <div class="md-form mt-3">
                                    <input type="text" id="car_name" name="car_name" class="form-control" autocomplete="off">
                                    <label for="car_name">Search By Name</label>
                                </div></div>

                            <div class="col">
                                <div class="md-form mt-3">
                                    <input type="text" id="price" name="price" class="form-control" autocomplete="off">
                                    <label for="price">Search By Price</label>
                                </div></div>
                        </div>

                        <!-- Send button -->
                        <div class="row">
                            <div class="col">

                            </div>
                            <div class="col">
                                <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" id="searchCarBtn" type="submit">Search</button>
                            </div>
                            <div class="col">
                                <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" onclick="resetSearchForm()" type="reset">Reset</button>
                            </div>
                            <div class="col">

                            </div>
                        </div>

                </form>
            </div>

        </div>
    </div>
</div>




