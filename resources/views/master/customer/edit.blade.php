{{-- edit modal --}}

<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Customer </h5>
                <button type="button" onclick="resetEditForm();" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="update">
                <div class="container">
                    <div class="modal-body">
                        @method('PUT')
                        @csrf
                        <div class="row justify-content-center">

                            <input type="hidden" name="cust_id" id="cust_id">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4 align-self-center">
                                            <label for="">Customer Name</label>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" name="editcustomerName" id="customerName"
                                                class="form-control" placeholder="Enter Customer Name" required>
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
                                            <input type="text" name="editaddress" id="address" class="form-control"
                                                placeholder="Enter Address" required>
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
                                            <input type="text" name="editlandmark" id="landmark"
                                                class="form-control"
                                                placeholder="Enter Landmark" required>
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
                                            <input type="number" name="editwallNo" id="wallNo"
                                                class="form-control"
                                                placeholder="Enter Wall No" required>
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
                                            <select name="editstate" id="state"
                                                onchange="getEditCities(this.value);"
                                                class="form-control" required>
                                                <option selected value="">Select State...</option>
                                                @foreach ($states as $items)
                                                    <option value="{{ $items->stateName }}">{{ $items->stateName }}
                                                    </option>
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
                                            <label for="city">City</label>
                                        </div>
                                        <div class="col-sm-7">
                                            <select name="editcity" id="city"
                                                class="form-control" required>
                                                <option value="">No Cities</option>
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
                                            <input name="editadvDate" type="date" id="advDate"
                                                class="form-control"
                                                required>
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
                                            <input type="number" name="editwallRent" id="wallRent"
                                                class="form-control"
                                                placeholder="Enter Wall Rent" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="reset" onclick="resetEditForm();" class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>

        </div>
    </div>
</div>

{{-- edit modal --}}


<script>
    function editCustomer($cust_id) {

        $('#editmodal').modal('show');
        // console.log($cust_id);

        $.ajax({
            url: "{{ route('home.edit') }}",
            type: 'get',
            data: {
                'cust_id': $cust_id
            },
            beforeSend: function() {

            },
            success: function($response) {
                getEditCities($response[0].state, $response[0].city);

                $('#cust_id').val($response[0].cust_id);
                $('#customerName').val($response[0].customerName);
                $('#customerName').val($response[0].customerName);
                $('#address').val($response[0].address);
                $('#landmark').val($response[0].landmark);
                $('#wallNo').val($response[0].wallNo);
                $('#state').val($response[0].state);
                // $('#city').val($response[0].city);
                $('#advDate').val($response[0].advDate);
                $('#wallRent').val($response[0].wallRent);

                // if ($response) {
                //     swal({
                //         title: "Alert!",
                //         text: "Customer Updated!",
                //         type: "success"
                //     }).then(function() {});
                // } else {
                //     swal({
                //         title: "Alert!",
                //         text: "Someting went wrong!",
                //         type: "error"
                //     }).then(function() {});
                // }


            },
            error: function(err) {
                console.log("Eroor => ", err);
            }
        });

    }

    function getEditCities(state, city) {

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
                $('#city').val(city);
            },
            error: function(err) {
                console.log("Eroor => ", err);
            }
        });

    }

    function resetEditForm() {

        $('#cust_id').val('');
        $('#customerName').val('');
        $('#customerName').val('');
        $('#address').val('');
        $('#landmark').val('');
        $('#wallNo').val('');
        $('#state').val('');
        $('#city').val('');
        $('#advDate').val('');
        $('#wallRent').val('');


    }
</script>
