<style type="text/css">
    .table-bordered thead tr th, .table-bordered tbody tr td, .table-bordered tbody tr th, .table-bordered tfoot tr td, .table-bordered tfoot tr th{
        border: 1px solid black !important;
    }
    @media print{
        /*.print-div{
            width: 102mm !important;
            height: 192mm !important;
            color: black;
        }*/  

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
    <div class="">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="card-title align-self-center m-1">Batche Date : {{date("d-M-Y", strtotime($batch->realdatetime))}}</h4>
                            <div class="mr-2">
                                <a href="{{route('cashdetail.batches')}}" title="Back" class="btn btn-sm btn-warning">Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            @if(count($entries))
                                @php
                                    $product_test = [];
                                    $product_net_sale = [];
                                    $product_amount = [];

                                    $total_phone_pay = 0;
                                    $total_sbiswap = 0;
                                    $total_hpclswap = 0;
                                    $total_creditsale = 0;
                                    $total_net_sale = 0;
                                    $total_cash_in = 0;
                                @endphp
                                @if(count($products))
                                    @foreach($products as $key => $product)
                                        @php
                                            $product_test[$product->id] = 0;
                                            $product_net_sale[$product->id] = 0;
                                            $product_amount[$product->id] = 0;
                                        @endphp
                                    @endforeach
                                @endif
                                @foreach($entries as $key => $entry)
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                                <tr>
                                                    <th colspan="2">{{date("d-M-Y H:i:s", strtotime($entry->realdatetime))}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="vertical-align: top;">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered text-center">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Nozle</th>
                                                                        <th>Test</th>
                                                                        <th>Net Sale</th>
                                                                        <th>Rate</th>
                                                                        <th>Amount</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @php
                                                                        $items = $entry->entryItems($entry->id);
                                                                    @endphp
                                                                    @if(count($items))
                                                                        @foreach($items as $index => $item)
                                                                            @php
                                                                                $product_test[$item->productId] = $product_test[$item->productId] + $item->test_qty;
                                                                                $product_net_sale[$item->productId] = $product_net_sale[$item->productId] + $item->net_sale;
                                                                                $product_amount[$item->productId] = $product_amount[$item->productId] + $item->amount;
                                                                            @endphp
                                                                            <tr>
                                                                                <td>{{$item->nozle}}({{$item->product}})</td>
                                                                                <td>{{$item->test_qty}}</td>
                                                                                <td>{{$item->net_sale}}</td>
                                                                                <td>{{$item->sale_rate}}</td>
                                                                                <td>{{$item->amount}}</td>
                                                                            </tr>
                                                                        @endforeach
                                                                    @endif
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td colspan="2">TOTAL SALE AMOUNT</td>
                                                                        <td>{{$entry->totalamount}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td colspan="2">PHONE PAY</td>
                                                                        <td>{{$entry->phonepayswap}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td colspan="2">SBI SWAP</td>
                                                                        <td>{{$entry->sbiswap}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td colspan="2">HPCL SWAP</td>
                                                                        <td>{{$entry->hpclswap}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td colspan="2">CREDIT SALE</td>
                                                                        <td>{{$entry->creditsale}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <th colspan="2">NET CASH SALE</th>
                                                                        <td>{{$entry->cash_amount}}</td>
                                                                    </tr>
                                                                </tfoot>
                                                                @php
                                                                    $total_phone_pay += $entry->phonepayswap;
                                                                    $total_sbiswap += $entry->sbiswap;
                                                                    $total_hpclswap += $entry->hpclswap;
                                                                    $total_creditsale += $entry->creditsale;
                                                                    $total_net_sale += $entry->cash_amount;
                                                                @endphp
                                                            </table>
                                                        </div>
                                                    </td>
                                                    <td style="vertical-align: top;">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered text-center">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>2000</td>
                                                                        <td>{{$entry->note_2000}}</td>
                                                                        <td>{{$entry->note_2000*2000}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>500</td>
                                                                        <td>{{$entry->note_500}}</td>
                                                                        <td>{{$entry->note_500*500}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>200</td>
                                                                        <td>{{$entry->note_200}}</td>
                                                                        <td>{{$entry->note_200*200}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>100</td>
                                                                        <td>{{$entry->note_100}}</td>
                                                                        <td>{{$entry->note_100*100}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>50</td>
                                                                        <td>{{$entry->note_50}}</td>
                                                                        <td>{{$entry->note_50*50}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>20</td>
                                                                        <td>{{$entry->note_20}}</td>
                                                                        <td>{{$entry->note_20*20}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>10</td>
                                                                        <td>{{$entry->note_10}}</td>
                                                                        <td>{{$entry->note_10*10}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>5</td>
                                                                        <td>{{$entry->note_5}}</td>
                                                                        <td>{{$entry->note_5*5}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>2</td>
                                                                        <td>{{$entry->note_2}}</td>
                                                                        <td>{{$entry->note_2*2}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>{{$entry->note_1}}</td>
                                                                        <td>{{$entry->note_1*1}}</td>
                                                                    </tr>
                                                                </tbody>
                                                                <tfoot>
                                                                    @php
                                                                        $total_cash_amount = ($entry->note_2000*2000)+($entry->note_500*500)+($entry->note_200*200)+($entry->note_100*100)+($entry->note_50*50)+($entry->note_20*20)+($entry->note_10*10)+($entry->note_5*5)+($entry->note_2*2)+($entry->note_1*1);
                                                                    @endphp
                                                                    <tr>
                                                                        <th colspan="2">TOTAL CASH IN</th>
                                                                        <td>{{round($total_cash_amount,2)}}</td>
                                                                    </tr>
                                                                    @php
                                                                        $total_cash_in += $total_cash_amount;
                                                                    @endphp
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                @endforeach
                            @endif
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td style="vertical-align: top;">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Product</th>
                                                                <th>Test</th>
                                                                <th>Net Sale</th>
                                                                <th>Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if(count($products))
                                                                @foreach($products as $key => $product)
                                                                    <tr>
                                                                        <td>{{$product->product}}</td>
                                                                        <td>{{$product_test[$product->id]}}</td>
                                                                        <td>{{$product_net_sale[$product->id]}}</td>
                                                                        <td>{{$product_amount[$product->id]}}</td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </td>
                                            <td style="vertical-align: top;">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <tbody>
                                                            <tr>
                                                                <td>PHONE PAY</td>
                                                                <td>{{$total_phone_pay}}</td>
                                                                <td>CREDIT SALE</td>
                                                                <td>{{$total_creditsale}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>SBI SWEP</td>
                                                                <td>{{$total_sbiswap}}</td>
                                                                <td>NET CASH SALE</td>
                                                                <td>{{$total_net_sale}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>HPCL SWEP</td>
                                                                <td>{{$total_hpclswap}}</td>
                                                                <td>TOTAL CASH IN</td>
                                                                <td>{{$total_cash_in}}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>