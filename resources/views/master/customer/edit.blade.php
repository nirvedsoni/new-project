<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Customer </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="container">
                <div class="modal-body">
                    <form method="POST" action="store">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4 align-self-center">
                                            <label for="">Customer Name</label>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" name="customerName"
                                                class="@error('customerName') is-invalid @enderror form-control"
                                                placeholder="Enter Customer Name">
                                            @error('customerName')
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
                                            <input type="text" name="address"
                                                class="@error('address') is-invalid @enderror form-control"
                                                placeholder="Enter Address">
                                            @error('address')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4 align-self-center float-start">
                                            <label for="">Landmark</label>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" name="landmark"
                                                class="@error('landmark') is-invalid @enderror form-control"
                                                placeholder="Enter Landmark">
                                            @error('landmark')
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
                                            <input type="text" name="wallNo"
                                                class="@error('wallNo') is-invalid @enderror form-control"
                                                placeholder="Enter Wall No">
                                            @error('wallNo')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4 align-self-center">
                                            <label for="inputState">State</label>
                                        </div>
                                        <div class="col-sm-7">
                                            <select name="state" id="searchState" onchange="getCities(this.value);" ;
                                                class="@error('state') is-invalid @enderror form-control">
                                                <option selected value="">Select State...</option>
                                            </select>
                                            @error('state')
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
                                            <label for="inputState">City</label>
                                        </div>
                                        <div class="col-sm-7">
                                            <select name="City" id="city"
                                                class=" @error('state') is-invalid @enderror form-control">
                                                <option selected value="">No Cities</option>
                                            </select>
                                            @error('City')
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
                                            <input name="advDate" type="date"
                                                class="@error('advDate') is-invalid @enderror form-control">
                                            @error('advDate')
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
                                            <input type="text" name="wallRent"
                                                class="@error('wallRent') is-invalid @enderror form-control"
                                                placeholder="Enter Wall Rent">
                                            @error('wallRent')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-end">Submit</button>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
