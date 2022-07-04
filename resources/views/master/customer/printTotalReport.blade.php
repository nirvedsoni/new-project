<style type="text/css">
    @media print {
        .print-div {
            color: black;
            /* padding: 40px 40px; */
            padding: 80px 40px 40px;
        }
    }
</style>

<div class="print-div">
    <div class="container">
        <div class="head border-1 ">
            <div class="row">
                @if (count($totalData))
                LIST OF PAINTING OF YOUR HONOURABLE PRODUCT OF <h6>  {{ $totalData[0]->landmark }}
                        {{ $totalData[0]->city }} {{ $totalData[0]->state }} </h6>
                @endif
            </div>
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
                @if (count($totalData))
                    @foreach ($totalData as $key => $value)
                        @php
                            $totalSizes = App\size::where('cust_id', $value->cust_id)->get();
                        @endphp
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $value->customerName }}, {{ $value->address }}</td>
                            <td>
                                @if (count($totalSizes))
                                    @foreach ($totalSizes as $skey => $svalue)
                                        <p>{{ $svalue->size }}</p>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @if (count($totalSizes))
                                    @foreach ($totalSizes as $skey => $svalue)
                                        <p>{{ $svalue->squareFeet }}</p>
                                    @endforeach
                                @endif
                            </td>
                            <td>{{ $value->wallRent }}</td>
                        </tr>
                        @if (count($totalSizes) > 1)
                            <tr>
                                <td></td>
                                <td></td>
                                <td><strong>Total</strong></td>
                                <td>
                                    <strong>{{ $totalSizes->sum('squareFeet') }}</strong>
                                </td>
                                <td></td>
                            </tr>
                        @endif
                    @endforeach
                @endif

            </tbody>

        </table>
    </div>
</div>
