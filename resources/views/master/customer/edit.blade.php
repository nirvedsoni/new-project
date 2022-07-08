{{-- edit modal --}}

<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Customer </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                class="@error('editcustomerName') is-invalid @enderror form-control"
                                                placeholder="Enter Customer Name">
                                            @error('editcustomerName')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
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
                                            <input type="text" name="editaddress" id="address"
                                                class="@error('editaddress') is-invalid @enderror form-control"
                                                placeholder="Enter Address">
                                            @error('editaddress')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
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
                                                class="@error('editlandmark') is-invalid @enderror form-control"
                                                placeholder="Enter Landmark">
                                            @error('editlandmark')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
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
                                            <input type="text" name="editwallNo" id="wallNo"
                                                class="@error('editwallNo') is-invalid @enderror form-control"
                                                placeholder="Enter Wall No">
                                            @error('editwallNo')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
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
                                                onchange="getEditCities(this.value);" ;
                                                class="@error('editstate') is-invalid @enderror form-control">
                                                <option selected value="">Select State...</option>
                                                @foreach ($states as $items)
                                                    <option value="{{ $items->stateName }}">{{ $items->stateName }}
                                                    </option>
                                                @endforeach

                                            </select>
                                            @error('editstate')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
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
                                                class=" @error('editcity') is-invalid @enderror form-control">
                                                <option value="">No Cities</option>
                                            </select>
                                            @error('editcity')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
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
                                                class="@error('editadvDate') is-invalid @enderror form-control">
                                            @error('editadvDate')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
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
                                            <input type="text" name="editwallRent" id="wallRent"
                                                class="@error('editwallRent') is-invalid @enderror form-control"
                                                placeholder="Enter Wall Rent">
                                            @error('editwallRent')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
        console.log($cust_id);

        $.ajax({
            url: "{{ route('home.edit') }}",
            type: 'get',
            data: {
                'cust_id': $cust_id
            },
            beforeSend: function() {

            },
            success: function($response) {
                console.log('1st');
                getEditCities($response[0].state,$response[0].city);
                setData($response);

            },
            error: function(xhr) {
                console.log(xhr);
            }
        });

    }

    function getEditCities(state, city) {
        console.log('2nd');
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
            error: function(xhr) {

            }
        });
    }

    async function setData($response) {
        console.log('3rd')

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

    }
</script>
