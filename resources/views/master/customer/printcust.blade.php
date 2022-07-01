<style type="text/css">
    @media print {
        .print-div {
            color: black;
            padding: 40px;
        }

        ;

        .table-bordered thead tr th,
        .table-bordered tbody tr td,
        .table-bordered tbody tr th,
        .table-bordered tfoot tr td,
        .table-bordered tfoot tr th {
            border: 1px solid black !important;
        }

        ;

    }
</style>
<div class="print-div">
    {{-- <div class="container" >
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr class="text-center">
                        <th scope="col">S.No.</th>
                        <th scope="col">Cust. Id</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Customer Address</th>
                        <th scope="col">Landmark</th>
                    </tr>
                    @foreach ($customersData as $key => $value)
                        <tr class="text-center">
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $value->cust_id }}</td>
                            <td>{{ $value->customerName }}</td>
                            <td>{{ $value->address }}</td>
                            <td>{{ $value->landmark }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr class="text-center">
                        <th scope="col">S.No.</th>
                        <th scope="col">Cust. Id</th>
                        <th scope="col">Nos</th>
                        <th scope="col">Size</th>
                        <th scope="col">Square Feet</th>
                    </tr>
                    @foreach ($customerSizes as $key => $value)
                        <tr class="text-center">
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $value->cust_id }}</td>
                            <td>{{ $value->nos }}</td>
                            <td>{{ $value->size }}</td>
                            <td>{{ $value->squareFeet }}</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div> --}}

    <div class="container">

        <div class="card b">
            <div class="card-body py-0">
                <div class="row">
                    <div class="col-sm-9 pt-0  b-right">
                        @foreach ($customersData as $key => $value)
                            <div class="row b-btm text-center">

                                <div class="col-sm-4 b-right">
                                    <h5>{{ $value->landmark }}</h5>

                                </div>
                                <div class="col-sm-4 b-right">
                                    <h5>{{ $value->city }}</h5>
                                </div>
                                <div class="col-sm-4 b-right">
                                    <h5>{{ $value->state }}</h5>
                                </div>
                            </div>
                        @endforeach


                        <div class="row">
                            <div class="pic"style="height: 300px;">
                                <h1></h1>
                            </div>
                        </div>
                        <div class="row b">
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-3">plase </div>
                                    <div class="col-sm-6 h6">plasa name</div>
                                </div>

                            </div>
                            <div class="col-sm-3">
                                <div class="row">
                                    <div class="col-sm-6">wall </div>
                                    <div class="col-sm-6 h6">12</div>
                                </div>

                            </div>
                            <div class="col-sm-9">
                                <div class="row">customerSize
                                    <div class="col-sm-3">Dealer Name </div>
                                    <div class="col-sm-6 h6">plasa name</div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="row">
                                    <div class="col-sm-6">wall Rent </div>
                                    <div class="col-sm-6 h6">12</div>
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-3">Date </div>
                                    <div class="col-sm-6 h6">plasa name</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="row b-btm text-center">
                            <div class="col-sm-6 b-right">
                                <h5>size</h5>
                            </div>
                            <div class="col-sm-6 b-right">
                                <h5>SQ.FEET</h5>
                            </div>
                        </div>
                        <div class="row b-left">
                            @foreach ($customersData as $key => $value)
                                <div class="col-sm-6 b">
                                    <div class="text-center p-1 mb-0">
                                        <h5>{{ $value->size }}</h5>
                                    </div>
                                </div>
                                <div class="col-sm-6 b">
                                    <div class="text-center p-1 mb-0">
                                        <h5>{{ $value->squareFeet }}</h5>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
