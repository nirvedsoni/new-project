@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'home',
    'title' => 'Customer List',
])

@section('content')
    <div class="content">
        <div class="">
            <div class="row">
                <div class="col-12" id="customerDiv" style="padding-right: 0px;">
                    <div class="card">
                        <div class="card-header d-flex justify-content-center">
                            {{-- <h4 class="card-title align-self-center m-1">Customer List</h4> --}}
                            @if (Session::get('cstatus'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('cstatus') }}
                                    {{-- <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close">delete
                                    </button> --}}
                                </div>
                            @endif
                            <div>
                                <a href="{{ route('home.add') }}" class="btn btn-warning btn-round">Add New Customer</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('home.list') }}">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-3 text-center mt-2">
                                                    <label for="searchState">State</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="searchState" id="searchState"
                                                        onchange="getCities(this.value);">
                                                        <option selected value="">Select</option>
                                                        @if (count($states))
                                                            @foreach ($states as $key => $value)
                                                                <option value="{{ $value->stateName }}"
                                                                    @if ($value->stateName == $searchState)  @endif>
                                                                    {{ $value->stateName }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-3 mt-2">
                                                    <label for="searchCity">City</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <select class="form-control" name="searchCity" id="searchCity">
                                                        <option value="">Select</option>
                                                        @if (count($cities))
                                                            @foreach ($cities as $key => $value)
                                                                <option value="{{ $value->cityName }}"
                                                                    @if ($value->cityName == $searchCity) selected @endif>
                                                                    {{ $value->cityName }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 mt-2">
                                                    <label for="keyword">Name/Landmark</label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" name="keyword" id="keyword" class="form-control"
                                                        value="{{ $keyword }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <button title="Search" class="btn btn-social btn-just-icon btn-md btn-primary"
                                                type="submit">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr class="text-primary">
                                            <th class="p-0" scope="col">S.No</th>
                                            <th scope="col" class="text-center">Actions</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">address</th>
                                            <th scope="col">landmark</th>
                                            <th class="sh" scope="col">wallNo</th>
                                            <th scope="col">state</th>
                                            <th scope="col">City</th>
                                            <th class="sh" scope="col">advDate</th>
                                            <th class="sh" scope="col">wallRent</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if (count($data))
                                            @php
                                                $page = 1;
                                                if (isset($_GET['page'])) {
                                                    $page = $_GET['page'];
                                                }
                                            @endphp
                                            @foreach ($data as $key => $items)
                                                <tr>
                                                    <th scope="row">{{ $key + 1, ($page - 1) * 10 }}</th>
                                                    <td class="text-center">
                                                        <button title="Size"
                                                            class="btn btn-social btn-just-icon btn-sm btn-primary"
                                                            onclick="getSizes('{{ $items->cust_id }}','{{ $items->customerName }}','{{ $items->landmark }}');">
                                                            size
                                                        </button>
                                                        <button title="Edit" 
                                                        onclick="edit('{{ $items->cust_id }}');"
                                                            class="sh btn btn-social btn-just-icon btn-sm btn-success m-1">
                                                            <i class="fa fa-pencil"></i>
                                                        </button>
                                                        <button title="Delete" onclick="deleteCustomer('{{ $items->cust_id }}');"
                                                            class="sh btn btn-social btn-just-icon btn-sm btn-danger">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </td>
                                                    <td>{{ $items->customerName }}</td>
                                                    <td>{{ $items->address }}</td>
                                                    <td>{{ $items->landmark }}</td>
                                                    <td class="sh">{{ $items->wallNo }}</td>
                                                    <td>{{ $items->state }}</td>
                                                    <td>{{ $items->city }}</td>
                                                    <td class="sh">{{ $items->advDate }}</td>
                                                    <td class="sh">{{ $items->wallRent }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            {{ $data->links() }}
                        </div>
                    </div>
                </div>


                {{-- size div  --}}

                <div class="col-6" id="sizeDiv" style="display:none; Position ">
                    <div class="card" style="position: fixed;">
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="card-title align-self-center m-1" id="sizeList">Size List </h4>
                            @if (Session::get('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('status') }}
                                    {{-- <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close">delete
                                    </button> --}}
                                </div>
                            @endif
                            <div>
                                <button type="button" class="btn btn-danger btn-round"
                                    onclick="closeSizeDiv();">Close</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" id="sizeform">
                                @csrf()
                                @method('post')
                                <input type="hidden" name="cust_id" id="customerId">
                                <input type="hidden" name="landmark" id="landmarkId">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Nos:</label>
                                            <input type="number" id="nos" name="nos" class="form-control"
                                                onkeyup="calculate_sqfeet();" onchange="calculate_sqfeet();">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Size:</label>
                                            <input type="text" id="size" name="size" class="form-control"
                                                onkeyup="calculate_sqfeet();">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Square Feet:</label>
                                            <input type="text" id="squareFeet" name="squareFeet"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-3 align-self-center">
                                        <button type="button" id="sizeSubmit" class="btn btn-primary mt-4">Save</button>
                                    </div>
                                </div>
                            </form>


                            <hr>
                            <div class="row container">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr class="text-primary">
                                                <th scope="col">Id</th>
                                                <th scope="col">Size</th>
                                                <th scope="col">Nos</th>
                                                <th scope="col">Square Feet</th>
                                                <th scope="col" class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="customerSize">
                                            <tr class="text-danger">
                                                <th class="text-center" colspan="5">Empty</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- edit modal  --}}


    @include('master.customer.edit')

    
    <script>
        $('#sizeSubmit').click(function() {

            $.ajax({
                url: "sizeStore",
                data: $('form').serialize(),
                type: 'post',
                success: function(result) {
                    // alert(result);
                    // if (result) {
                    //     swal({
                    //         title: "Alert!",
                    //         text: "Data saved!",
                    //         type: "success"
                    //     }).then(function() {
                    //     });
                    // } else {
                    //     swal({
                    //         title: "Alert!",
                    //         text: "Something went wrong!",
                    //         type: "error"
                    //     }).then(function() {});
                    // }
                    getSizes($("#customerId").val(), '', $("#landmarkId").val());


                },
                error: function(xhr) {
                    console.log('ggg=', xhr);
                }
            })

        });

        function getCities(state) {
            $.ajax({
                url: "{{ route('city.get') }}",
                type: 'get',
                data: {
                    'state': state
                },
                beforeSend: function() {

                },
                success: function(response) {
                    $("#searchCity").html(response);
                },
                error: function(xhr) {

                }
            });
        }

        // function getCustomer(cust_id) {
        //     $("#customerId").val(cust_id);
        //     document.getElementById("sizeList").innerHTML = "Size List of " + cust_id;
        // }

        function getSizes(cust_id, customerName, landmark) {
            $("#customerDiv").removeClass("col-12");
            $("#customerDiv").addClass("col-6");
            $(".sh").addClass("d-none");

            $("#sizeDiv").show();
            $("#customerId").val(cust_id);
            $("#landmarkId").val(landmark);
            if (customerName) {
                document.getElementById("sizeList").innerHTML = "Size List of " + customerName;
            }

            $.ajax({
                url: "{{ route('home.getsizes') }}",
                type: 'get',
                data: {
                    'cust_id': cust_id
                },
                beforeSend: function() {

                },
                success: function(response) {
                    $("#customerSize").html(response);
                },
                error: function(xhr) {

                }
            });
        }


        function deleteCustomer(custId) {
            $.confirm({
                title: 'Alert!',
                content: 'Are you sure to delete customer and sizes?',
                buttons: {
                    confirm: {
                        text: 'Confirm',
                        btnClass: 'btn-red',
                        action: function() {
                            $.ajax({
                                url: "{{ route('customer.delete') }}",
                                type: 'get',
                                data: {
                                    'custId': custId
                                },
                                beforeSend: function() {

                                },
                                success: function(response) {
                                    if (response == true) {
                                        swal({
                                            title: "Alert!",
                                            text: "Customer deleted!",
                                            type: "success"
                                        }).then(function() {
                                            window.reload();
                                        });
                                    } else {
                                        swal({
                                            title: "Alert!",
                                            text: "Someting went wrong!",
                                            type: "error"
                                        }).then(function() {});
                                    }
                                },
                                error: function(xhr) {
                                    console.log('dlt eror=>',xhr)

                                }
                            });
                        }
                    },
                    cancel: function() {}
                }
            });
            
        }

        function deleteSize(id) {
            $.confirm({
                title: 'Alert!',
                content: 'Are you sure to delete size?',
                buttons: {
                    confirm: {
                        text: 'Confirm',
                        btnClass: 'btn-red',
                        action: function() {
                            $.ajax({
                                url: "{{ route('home.delete') }}",
                                type: 'get',
                                data: {
                                    'id': id
                                },
                                beforeSend: function() {

                                },
                                success: function(response) {
                                    if (response == true) {
                                        swal({
                                            title: "Alert!",
                                            text: "Size deleted!",
                                            type: "success"
                                        }).then(function() {
                                            getSizes($("#customerId").val(), '', $("#landmarkId").val());
                                        });
                                    } else {
                                        swal({
                                            title: "Alert!",
                                            text: "Someting went wrong!",
                                            type: "error"
                                        }).then(function() {});
                                    }
                                },
                                error: function(xhr) {

                                }
                            });
                        }
                    },
                    cancel: function() {}
                }
            });
        }

        function closeSizeDiv() {
            $("#customerId").val('');
            $("#customerSize").html(` <tr class="text-danger">
                                                <th class="text-center" colspan="5">Loading...</th>
                                            </tr>`);

            $("#customerDiv").removeClass("col-6");
            $("#customerDiv").addClass("col-12");
            $(".sh").removeClass("d-none");

            $("#sizeDiv").hide();
        }

        var nos = $("#nos").val(1);

        function calculate_sqfeet() {
            var size = $("#size").val();
            var nos = $("#nos").val();

            if (!nos) {
                nos = 0;
            }

            var sq_feet = "";
            if (size) {
                // console.log(eval(size));
                if (size.includes("*")) {
                    sq_feet = eval(size) * nos;
                }
            }

            $("#squareFeet").val(sq_feet);
        }

        function edit(id) {

            $('#editmodal').modal('show');
      
        }


    </script>

    
@endsection
