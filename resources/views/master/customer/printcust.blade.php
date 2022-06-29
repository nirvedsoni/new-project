<style type="text/css">
    @media print {
        .print-div {
            color: black;
            padding: 40px;
        };

        .table-bordered thead tr th,
        .table-bordered tbody tr td,
        .table-bordered tbody tr th,
        .table-bordered tfoot tr td,
        .table-bordered tfoot tr th {
            border: 1px solid black !important;
        };

    }
</style>
<div class="print-div">
    <div>
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
                            <td>{{ $value->customerId }}</td>
                            <td>{{ $value->nos }}</td>
                            <td>{{ $value->size }}</td>
                            <td>{{ $value->squareFeet }}</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
