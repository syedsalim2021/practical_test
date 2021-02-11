<script>

    $(document).ready(function() {
        dataTableInit();

    });


    function dataTableInit() {

        manageTable =   $("#list").DataTable({
            "ajax": "{{route('allSpecification')}}",
            "method": "get",
            "order": [],
            responsive: true,
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            dom: 'Bfrtip',

            buttons:[
                {
                    extend:"excel",
                    className:"btn bg-excel btn-flat margin",
                    text: '<img src="{{asset('images/icons/excel.svg')}}">',
                    exportOptions: {
                        columns: 'th:not(:last-child)'
                    }
                }
                ,{
                    extend:"pdf",
                    className:"btn bg-red btn-flat margin",
                    text: '<img src="{{asset('images/icons/pdf.svg')}}">',
                    exportOptions: {
                        columns: 'th:not(:last-child)'
                    }
                },{
                    extend:"print",
                    className:"btn bg-blue btn-flat margin",
                    text: '<img src="{{asset('images/icons/print.svg')}}">',
                    exportOptions: {
                        columns: 'th:not(:last-child)'
                    }
                }
            ]
        });
        $('#list_wrapper').find('label').each(function () {
            $(this).parent().append($(this).children());
        });
        $('#list_wrapper .dataTables_filter').find('input').each(function () {
            // $('input').attr("placeholder", "Search");
            $('input').removeClass('form-control-sm');
        });
        $('#list_wrapper .dataTables_length').addClass('d-flex flex-row');
        $('#list_wrapper .dataTables_filter').addClass('md-form');
        $('#list_wrapper select').removeClass('custom-select custom-select-sm form-control form-control-sm');
        $('#list_wrapper select').addClass('mdb-select');
        $('#list_wrapper .mdb-select').material_select();
        $('#list_wrapper .dataTables_filter').find('label').remove();
    }


    $(document).ready(function() {

        $("#submitBtn").on('click', function() {

            $(".form-group").removeClass('has-error').removeClass('has-success');
            $(".text-danger").remove();
            $(".messages").html("");
            $("#InsertForm").unbind('submit').bind('submit', function() {

                $(".text-danger").remove();

                var form = $(this);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });



                var postData = new FormData($("#InsertForm")[0]);
                $.ajax({
                    cache:false,
                    contentType: false,
                    processData: false,
                    url : form.attr('action'),
                    type : form.attr('method'),
                    dataType : 'json',
                    data : postData,
                    // data : form.serialize(),
                    success:function(response) {

// remove the error
                        $(".form-group").removeClass('has-error').removeClass('has-success');

                        if(response.success == true) {
                            toastr.success('Added Successfully.', 'Specification', {timeOut: 5000});
                            $("#InsertForm")[0].reset();
                            manageTable.ajax.reload(null, false);
                        }
                        else
                        {
                            toastr.error(response.messages, '', {timeOut: 5000});
                        }  // /else
                    } // success
                }); // ajax subit

                return false;
            }); // /submit form for create member
        }); // /add modal

    });

    /* -------REMOVE CAR TYPE---------*/
    function removeItem(id = null) {
        if(id) {
            // click on remove button
            $("#removeBtn").unbind('click').bind('click', function() {
                $(".loader-ajax").fadeOut("slow").show();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{route('removeSpecification')}}',
                    type: 'post',
                    data: {specification : id},
                    dataType: 'json',
                    success:function(response) {
                        if(response.success == true) {
                            // refresh the table
                            manageTable.ajax.reload(null, false);
                            // close the modal
                            toastr.success('Deleted Successfully.', 'Specification', {timeOut: 3000});
                            $("#modalConfirmDelete").modal('hide');
                            $(".loader-ajax").hide();

                        } else {
                            toastr.error('Not Deleted.', 'Specification', {timeOut: 3000});
                        }
                    }
                });
            }); // click remove btn
        }
        else
        {
            alert('Error: Refresh the page again');
        }
    }

    function editItem(id = null) {
        $(".loader-ajax").fadeOut("slow").show();
        if(id) {

            $("#edit_id").remove();

// fetch the member data
            $.ajax({
                url: '{{route('editSpecification')}}',
                type: 'post',
                data: {id: id},
                dataType: 'json',
                success:function(response) {
                    $(".loader-ajax").hide();
                    $("#edit_car_name").val(response.specification.car_name);
                    $("#edit_model").val(response.specification.model);
                    $("#edit_price").val(response.specification.price);
                    $("#edit_color").val(response.specification.color);
                    $("#edit_milage").val(response.specification.milage);

                    $("#edit_terminology_id").empty();
                    $("#edit_terminology_id").append(response.terminology_data);
                    $('#edit_terminology_id').material_select();

                    $("#carImage").empty();
                    $("#carImage").append(response.image);

// mmeber id
                    $("#editForm").append('<input type="hidden" name="id" id="edit_id" value="'+id+'"/>');

// here update the location data
                    $("#editForm").unbind('submit').bind('submit', function() {
                        $(".loader-ajax").fadeOut("slow").show();
// remove error messages
                        $(".text-danger").remove();

                        var form = $(this);

                        var postData = new FormData($("#editForm")[0]);
// validation
                        $.ajax({
                            cache:false,
                            contentType: false,
                            processData: false,
                            url : form.attr('action'),
                            type : form.attr('method'),
                            dataType : 'json',
                            data : postData,
                            success:function(response) {
                                $(".loader-ajax").hide();
                                if(response.success == true) {

                                    $('#editModal').modal('hide');
                                    toastr.success(response.messages, '', {timeOut: 3000});
                                    manageTable.ajax.reload(null, false);

                                } else {
                                    toastr.error(response.messages, '', {timeOut: 3000});
                                }
                            } // /success
                        }); // /ajax


                        return false;
                    });

                } // /success
            }); // /fetch selected member info

        } else {
            alert("Error : Refresh the page again");
        }
    }


    /* -------SEARCH CAR---------*/
    $("#searchCarBtn").on('click', function() {

        $(".loader-ajax").fadeOut("slow").show();
// submit form
        $("#searchCarForm").unbind('submit').bind('submit', function() {

            $(".text-danger").remove();

            var form = $(this);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            /**
             * Search Date Ajax
             */
            var postData = new FormData($("#searchCarForm")[0]);
            $.ajax({
                cache:false,
                contentType: false,
                processData: false,
                url : form.attr('action'),
                type : form.attr('method'),
                dataType : 'json',
                data : postData,

                success:function(response) {

                    if (response.success != false)
                    {
                        if (response.messages == 'Not Found.'){
                            toastr.error(response.messages, 'Record', {timeOut: 3000});
                        }
                        else{
                            toastr.success(response.messages, 'Record', {timeOut: 3000});
                        }

                        $('#list').DataTable().clear().destroy();

                        manageTable = $('#list').DataTable(response);

                        new $.fn.dataTable.Buttons(manageTable, {
                            buttons:[
                                {
                                    extend:"excel",
                                    className:"btn bg-excel btn-flat margin",
                                    text: '<img src="{{asset('images/icons/excel.svg')}}">',
                                    exportOptions: {
                                        columns: 'th:not(:last-child)'
                                    }
                                }
                                , {
                                    extend: "pdf",
                                    className: "btn bg-red btn-flat margin",
                                    text: '<img src="{{asset('images/icons/pdf.svg')}}">',
                                    exportOptions: {
                                        columns: 'th:not(:last-child)'
                                    },
                                }
                                , {
                                    extend: "print",
                                    className: "btn bg-red btn-flat margin",
                                    text: '<img src="{{asset('images/icons/print.svg')}}">',
                                    exportOptions: {
                                        columns: 'th:not(:last-child)'
                                    },
                                }
                            ]
                        });

                        manageTable.buttons( 0, null ).container().prependTo(
                            manageTable.table().container()
                        );

                        $("#list_length").hide();
                        $(".loader-ajax").hide();
                    }
                    else {
                        toastr.warning(response.messages, 'Error', {timeOut: 3000});
                        $(".loader-ajax").hide();
                    }
                }
            });

            return false;
        });
    });

</script>
