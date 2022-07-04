<div class="print-div">
    <div class="container">
        <div class="head">

        </div>
        <table class="table table-bordered">
            <thead>
                <tr class="text-primary">
                    <th scope="col">S.NO.</th>
                    <th scope="col">PARTICULARS</th>
                    <th scope="col">SIZE(feet)</th>
                    <th scope="col">SQ. FEET</th>
                    <th scope="col">WALL RENT(Rs)</th>
                </tr>
            </thead>
            <tbody id="customerData">
                @foreach ($totalData as $key => $value)
                    @php
                        $totalSizes = App\size::where('cust_id', $value->cust_id)->get();
                    @endphp
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $value->customerName }} , {{ $value->address }}</td>
                        <td>
                            @foreach ($totalSizes as $skey => $svalue)
                                <p>{{ $svalue->size }}</p>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($totalSizes as $skey => $svalue)
                                <p>{{ $svalue->squareFeet }}</p>
                            @endforeach
                        </td>

                        <td>{{ $value->wallRent }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td>Total</td>
                    <td>
                        @foreach ($totalData as $key => $value)
                            @php
                                $totalSizes = App\size::where('cust_id', $value->cust_id)->get();
                            @endphp
                            @foreach ($totalSizes as $skey => $svalue)
                                <p>{{ $svalue->sum('squareFeet') }}</p>
                            @endforeach
                        @endforeach
                        
                    </td>
                </tr>

            </tbody>

        </table>
    </div>
</div>
