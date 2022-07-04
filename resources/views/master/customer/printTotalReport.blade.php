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
                @if(count($totalData))
                    @foreach ($totalData as $key => $value)
                        @php
                            $totalSizes = App\size::where('cust_id', $value->cust_id)->get();
                        @endphp
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $value->customerName }} , {{ $value->address }}</td>
                            <td>
                                @if(count($totalSizes))
                                    @foreach ($totalSizes as $skey => $svalue)
                                        <p>{{ $svalue->size }}</p>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @if(count($totalSizes))
                                    @foreach ($totalSizes as $skey => $svalue)
                                        <p>{{ $svalue->squareFeet }}</p>
                                    @endforeach
                                @endif
                            </td>
                            <td>{{ $value->wallRent }}</td>
                        </tr>
                        @if(count($totalSizes) > 1)
                            <tr>
                                <td></td>
                                <td></td>
                                <td><strong>Total</strong></td>
                                <td>
                                    <strong>{{ $totalSizes->sum('squareFeet') }}</strong>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endif
            </tbody>

        </table>
    </div>
</div>
