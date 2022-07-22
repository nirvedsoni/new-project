@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'home',
    'title' => 'Customer Add',
])

@section('content')
    <div class="content">
        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('error') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="card">
                    <div class="card-header d-flex justify-content-center">
                        {{-- <h5 class="card-title align-self-center m-1">Customer Add</h5> --}}
                        {{-- <div>
                            <a href="{{ route('home.list') }}" class="btn btn-warning btn-round">Customer List</a>
                        </div> --}}
                    </div>
                    <div class="card-body">
                        <form method="POST" action="store">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4 align-self-center">
                                                <label for="">Customer Name</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <input type="text" name="customerName" class="form-control"
                                                    placeholder="Enter Customer Name" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4 align-self-center">
                                                <label for="">Address</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <input type="text" name="address" class="form-control"
                                                    placeholder="Enter Address" @if ($allData) value="{{ $allData->address }}" @endif required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center ">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4 align-self-center float-start">
                                                <label for="">Landmark</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <input type="text"
                                                    @if ($allData) value="{{ $allData->landmark }}" @endif
                                                    name="landmark" class="form-control" placeholder="Enter Landmark"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4 align-self-center">
                                                <label for="">Wall No.</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <input type="number" name="wallNo"
                                                    @if ($allData) value="{{ $allData->wallNo }}" @endif
                                                    class="form-control" placeholder="Enter Wall No" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center ">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4 align-self-center">
                                                <label for="inputState">State</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <select name="state" id="searchState"
                                                    onchange="getCities(this.value)" required class="form-control">
                                                    <option selected value="">Select State</option>

                                                    @foreach ($sData as $items)
                                                        <option value="{{ $items->stateName }}" @if ($allData) @if($allData->state == $items->stateName) selected @endif @endif>
                                                            {{ $items->stateName }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4 align-self-center">
                                                <label for="inputState">City</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <select name="City" id="city" class="form-control" required>
                                                    @if(count($cData))
                                                        <option selected value="">Select City</option>
                                                        @foreach ($cData as $items)
                                                            <option value="{{ $items->cityName }}" @if ($allData) @if($allData->city == $items->cityName) selected @endif @endif>
                                                                {{ $items->cityName }}</option>
                                                        @endforeach
                                                    @else
                                                    <option selected value="">No Cities</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center ">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4 align-self-center float-start">
                                                <label for="">Adv. Date</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <input name="advDate" id="advDate"
                                                    @if ($allData) value="{{ $allData->advDate }}" @else value="{{date('Y-m-d')}}" @endif
                                                    type="date" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4 align-self-center">
                                                <label for="">Wall Rent</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <input type="number" name="wallRent"
                                                    @if ($allData) value="{{ $allData->wallRent }}" @endif
                                                    class="form-control" placeholder="Enter Wall Rent" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-around">

                                @if ($currentId >= 0)
                                    <h6 class="card-title text-primary align-self-center m-1">Current Customer ID: <b
                                            class="text-danger"> {{ $currentId }}</b></h6>
                                @endif
                                <button type="submit" class="btn btn-primary">Submit</button>

                                @if ($lastId >= 0)
                                    <h6 class="card-title align-self-center m-1">Last Customer ID: <b> {{ $lastId }}
                                        </b></h6>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Size add --}}

        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header text-center">
                        {{-- <h5 class="card-title m-0">Size Add @if ($customerName)
                                of {{ $customerName }}
                            @endif
                        </h5> --}}

                    </div>
                    <div class="card-body pb-5">
                        <form action="" method="POST" id="sizeform">
                            @csrf()
                            @method('put')
                            <input type="hidden"
                                @if ($allData) value="{{ $allData->cust_id }}" @endif name="cust_id"
                                id="customerId">
                            <input type="hidden"
                                @if ($allData) value="{{ $allData->landmark }}" @endif
                                name="landmark" id="landmarkId">
                            <input type="hidden"
                                @if ($allData) value="{{ $allData->advDate }}" @endif name="advDate"
                                id="advDateId">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Nos:</label>
                                        <input required type="number" id="nos" name="nos"
                                            class="form-control" onkeyup="calculate_sqfeet();"
                                            onchange="calculate_sqfeet();">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Size:</label>
                                        <input required type="text" id="size" name="size"
                                            class="form-control" onkeyup="calculate_sqfeet();">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Square Feet:</label>
                                        <input required type="text" id="squareFeet" name="squareFeet"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-3 align-self-center">
                                    <button type="button" id="sizeSubmit" class="btn btn-primary mt-4">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- Size add --}}


            {{-- Size List --}}

            <div class="col-6">
                <div class="card">
                    <div class="card-header text-center">
                        {{-- <h5 class="card-title m-0" id="sizeList">Size List @if ($customerName)
                                of {{ $customerName }}
                            @endif
                        </h5> --}}
                    </div>
                    <div class="card-body">
                        <div class="row container">
                            <div class="table-responsive" style="overflow-y: scroll; height:200px">
                                <table class="table table-hover">
                                    <thead style="position:sticky; top: 0; background-color: white; z-index:999; ">
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

        {{-- Size List --}}
    </div>

    <script>
        // Shorthand for $( document ).ready()
        $(function() {
            var size = $("#customerId").val();
            var nos = $("#landmarkId").val();

            // todaysDate2();

            // function todaysDate2() {
            //     let d = new Date();
            //     var datestring = d.getFullYear() + "-" + ("0" + (d.getMonth() + 1)).slice(-2) + "-" + ("0" + d
            //         .getDate()).slice(
            //         -2);
            //     document.getElementById("advDate").value = datestring;

            // }

            getSizes($("#customerId").val(), '', $("#landmarkId").val());



        });
        // end j-query 

        // start javascript functions  

        let nos = $("#nos").val(1);

        function calculate_sqfeet() {
            var size = $("#size").val();
            var nos = $("#nos").val();

            var sq_feet = "";
            if (size) {
                // console.log(eval(size));
                if (size.includes("*")) {
                    sq_feet = eval(size) * nos;
                }
            }

            $("#squareFeet").val(sq_feet);
        }


        $('#sizeSubmit').click(function() {

            $.ajax({
                url: "sizeStore",
                data: $('#sizeform').serialize(),
                type: 'put',
                success: function(result) {
                    getSizes($("#customerId").val(), '', $("#landmarkId").val());
                },
                error: function(err) {
                    console.log("Eroor => ", err);
                }
            })

        });


        function getSizes(cust_id, customerName, landmark) {
            $("#customerDiv").removeClass("col-12");
            $("#customerDiv").addClass("col-6");
            $(".sh").addClass("d-none");

            $("#sizeDiv").show();
            $("#customerId").val(cust_id);
            $("#landmarkId").val(landmark);
            // if (customerName) {
            //     document.getElementById("sizeList").innerHTML = "Size List of " + customerName;
            // }

            if(cust_id){
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
                    error: function(err) {
                        console.log("Eroor => ", err);
                    }
                });
            }
        }



        function getCities(state) {
            // console.log(state);
            $.ajax({
                url: "{{ route('city.get') }}",
                type: 'get',
                data: {
                    'state': state
                },
                beforeSend: function() {

                },
                success: function(response) {
                    $("#city").html(response);
                },
                error: function(xhr) {

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
                                            getSizes($("#customerId").val(), '', $(
                                                "#landmarkId").val());
                                        });
                                    } else {
                                        swal({
                                            title: "Alert!",
                                            text: "Someting went wrong!",
                                            type: "error"
                                        }).then(function() {});
                                    }
                                },
                                error: function(err) {
                                    console.log("Eroor => ", err);
                                }
                            });
                        }
                    },
                    cancel: function() {}
                }
            });
        }
    </script>
@endsection
