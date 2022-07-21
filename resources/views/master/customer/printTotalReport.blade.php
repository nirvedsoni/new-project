<style type="text/css">
    @media print {
        .print-div {
            color: black;
            /* padding: 40px 40px; */
            padding: 50px 10px;
        }
    }
</style>

<div class="print-div">
    <div class="container">
        <div class="head" style="border: 1px solid rgba(167, 167, 167, 0.541);">
            <div class="row p-2" style="justify-content: center;">
                @if (count($totalData))
                    <p class="mb-0"> LIST OF PAINTING OF YOUR HONOURABLE PRODUCT OF:</p>
                    <h6 class="ml-5 mb-0"> {{ $totalData[0]->landmark }}</h6>
                    <h6 class="ml-5 mb-0"> {{ $totalData[0]->city }}</h6>
                    <h6 class="ml-5 mb-0"> {{ $totalData[0]->state }} </h6>
                @endif
            </div>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr class="text-primary">
                    <th scope="col">W.NO.</th>
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
                            <th scope="row">{{ $value->wallNo }}</th>
                            <td>{{ $value->customerName }}, {{ $value->address }}</td>
                            <td>
                                @if (count($totalSizes))
                                    @foreach ($totalSizes as $skey => $svalue)
                                        <p>{{ $svalue->size }} @if ($svalue->nos > 1)
                                                X{{ $svalue->nos }} (NOS)
                                            @endif
                                        </p>
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
                        {{-- @if (count($totalSizes) > 1)
                            <tr>
                                <td></td>
                                <td></td>
                                <td><strong>Total</strong></td>
                                <td>
                                    <strong>{{ $totalSizes->sum('squareFeet') }}</strong>
                                </td>
                                <td></td>
                            </tr>
                        @endif --}}
                    @endforeach

                    @if ($landmark)
                        @php
                            $totalSquareFeet = App\size::where('landmark', $landmark)->get();
                        @endphp
                    @endif

                    @if ($landmark)
                        @php
                            $totalWallRent = App\customer::where('landmark', $landmark)->get();
                        @endphp
                    @endif

                    @if ($fromDate)
                        @php
                           $DATA =  $totalSquareFeet ->whereBetween("advDate",[$fromDate, $toDate]);

                           $TDATA =  $totalWallRent ->whereBetween("advDate",[$fromDate, $toDate]);

                        @endphp

                    @endif

                    @if ($DATA && $TDATA)
                        <tr>
                            <td></td>
                            <td></td>
                            <td><strong>Grand Total</strong></td>
                            <td>
                                <strong>{{ $DATA->sum('squareFeet') }}</strong>
                            </td>
                            <td>
                                <strong>{{ $TDATA->sum('wallRent') }}</strong>
                            </td>
                        </tr>
                    @endif
                @endif


            </tbody>

        </table>
    </div>
</div>
