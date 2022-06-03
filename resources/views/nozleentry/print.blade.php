<style type="text/css">
    @media print{
        .print-div{
            width: 102mm !important;
            height: 192mm !important;
            color: black;
        }  

        .table-bordered thead tr th, .table-bordered tbody tr td, .table-bordered tbody tr th, .table-bordered tfoot tr td, .table-bordered tfoot tr th{
            border: 1px solid black !important;
        }
        @page {
            size: portrait;
            -webkit-transform: rotate(-90deg); 
            -moz-transform:rotate(-90deg);
            filter:progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
        }
    }  
</style>
<div class="print-div">
    <div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody style="font-size: 14px;">
                    <tr>
                        <td colspan="6">
                            <div class="d-flex justify-content-between">
                                <div class="text-left">Date</div>
                                <div class="text-right">Time</div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="text-left" id="real_date">{{date("d-M-Y", strtotime($entry->realdatetime))}}</div>
                                <div class="text-right" id="real_time">{{date("H:i:s", strtotime($entry->realdatetime))}}</div>
                            </div>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td>Nozle</td>
                        <td>Cl Reading</td>
                        <td>Test</td>
                        <td>Net Sale</td>
                        <td>Rate</td>
                        <td>Amount</td>
                    </tr>
                    @if(count($entryItems))
                        @foreach($entryItems as $key => $value)
                            <tr class="text-center">
                                <td>{{$value->nozle}}({{$value->product}})</td>
                                <td>{{$value->closing_reading}}</td>
                                <td>{{$value->test_qty}}</td>
                                <td>{{$value->net_sale}}</td>
                                <td>{{$value->sale_rate}}</td>
                                <td>{{$value->amount}}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
                <tfoot>
                    <tr style="font-size: 14px;">
                        <td>Total Sale Amount</td>
                        <td colspan="5" id="total_sale_amount">{{$entry->totalamount}}</td>
                    </tr>
                    <tr style="font-size: 14px;">
                        <td>Phone Pay</td>
                        <td colspan="5" id="phonepay">{{$entry->phonepayswap}}</td>
                    </tr>
                    <tr style="font-size: 14px;">
                        <td>Sbi swep</td>
                        <td colspan="5" id="sbiswap">{{$entry->sbiswap}}</td>
                    </tr>
                    <tr style="font-size: 14px;">
                        <td>Hpcl Swep</td>
                        <td colspan="5" id="hpclswap">{{$entry->hpclswap}}</td>
                    </tr>
                    <tr style="font-size: 14px;">
                        <td>Credit sale</td>
                        <td colspan="5" id="creditsale">{{$entry->creditsale}}</td>
                    </tr>
                    <tr style="font-size: 14px;color: #c71b1b;">
                        <th><strong>Net Cash Sale</strong></th>
                        <th colspan="5" id="net_sale_amount">{{$entry->cash_amount}}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div>
        <div class="card-header text-center">
            <h5 class="title">{{ __('CASH DETAIL') }}</h5>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                @php
                    $total_cash_amount = 0;
                @endphp
                <tbody style="font-size:14px;">
                    <tr>
                        <td>2000</td>
                        <td>{{$entry->note_2000}}</td>
                        <td>{{($entry->note_2000*2000)}}</td>
                        @php
                            $total_cash_amount = $total_cash_amount + ($entry->note_2000*2000);
                        @endphp
                    </tr>
                    <tr>
                        <td>500</td>
                        <td>{{$entry->note_500}}</td>
                        <td>{{($entry->note_500*500)}}</td>
                        @php
                            $total_cash_amount = $total_cash_amount + ($entry->note_500*500);
                        @endphp
                    </tr>
                    <tr>
                        <td>200</td>
                        <td>{{$entry->note_200}}</td>
                        <td>{{($entry->note_200*200)}}</td>
                        @php
                            $total_cash_amount = $total_cash_amount + ($entry->note_200*200);
                        @endphp
                    </tr>
                    <tr>
                        <td>100</td>
                        <td>{{$entry->note_100}}</td>
                        <td>{{($entry->note_100*100)}}</td>
                        @php
                            $total_cash_amount = $total_cash_amount + ($entry->note_100*100);
                        @endphp
                    </tr>
                    <tr>
                        <td>50</td>
                        <td>{{$entry->note_50}}</td>
                        <td>{{($entry->note_50*50)}}</td>
                        @php
                            $total_cash_amount = $total_cash_amount + ($entry->note_50*50);
                        @endphp
                    </tr>
                    <tr>
                        <td>20</td>
                        <td>{{$entry->note_20}}</td>
                        <td>{{($entry->note_20*20)}}</td>
                        @php
                            $total_cash_amount = $total_cash_amount + ($entry->note_20*20);
                        @endphp
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>{{$entry->note_10}}</td>
                        <td>{{($entry->note_10*10)}}</td>
                        @php
                            $total_cash_amount = $total_cash_amount + ($entry->note_10*10);
                        @endphp
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>{{$entry->note_5}}</td>
                        <td>{{($entry->note_5*5)}}</td>
                        @php
                            $total_cash_amount = $total_cash_amount + ($entry->note_5*5);
                        @endphp
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>{{$entry->note_2}}</td>
                        <td>{{($entry->note_2*2)}}</td>
                        @php
                            $total_cash_amount = $total_cash_amount + ($entry->note_2*2);
                        @endphp
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>{{$entry->note_1}}</td>
                        <td>{{($entry->note_1*1)}}</td>
                        @php
                            $total_cash_amount = $total_cash_amount + ($entry->note_1*1);
                        @endphp
                    </tr>
                    <tr>
                        <th colspan="2">Total Amount</th>
                        <th id="total_cash_amount">{{$total_cash_amount}}</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>