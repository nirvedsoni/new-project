@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'comulativebatchreport',
    'title' => 'Comulative Batch Report'
])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title align-self-center m-1">Comulative Batch Report</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('comulative.batch.report')}}">
                            <div class="form-row">
                                <div class="form-group col-lg-2">
                                    <label for="searchFromDate">From Date</label>
                                    <input type="date" name="searchFromDate" id="searchFromDate" value="{{$searchFromDate}}" class="form-control">
                                </div>
                                <div class="form-group col-lg-2">
                                    <label for="searchToDate">To Date</label>
                                    <input type="date" name="searchToDate" id="searchToDate" value="{{$searchToDate}}" class="form-control">
                                </div>
                                <div class="form-group col-lg-2 col-sm-3">
                                    <button title="Search" class="btn btn-social btn-just-icon btn-md btn-primary mt-4" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        @if(count($reports))
                            @php
                                $entryIds = "";
                            @endphp
                            <div class="table-responsive">
                                <h5>Report</h5>
                                <table class="table table-bordered">
                                    <thead class="text-primary">
                                        <tr>
                                            <th>DATE</th>
                                            <th>NET CASH SALE</th>
                                            <th>PHONE PAY</th>
                                            <th>SBI SWAP</th>
                                            <th>HPCL SWAP</th>
                                            <th>CREDIT SALE</th>
                                            <th>TOTAL CASH IN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($reports as $key => $value)
                                            @php
                                                $nozle = $value->batch_nozles($value->entryIds);
                                                $entryIds .= (($entryIds == "") ? "" : ",") . $value->entryIds;
                                            @endphp
                                            <tr>
                                                <td>{{date("d M Y", strtotime($value->realdatetime))}}</td>
                                                <td>{{round($nozle->cash_amount,2)}}</td>
                                                <td>{{round($nozle->phonepayswap,2)}}</td>
                                                <td>{{round($nozle->sbiswap,2)}}</td>
                                                <td>{{round($nozle->hpclswap,2)}}</td>
                                                <td>{{round($nozle->creditsale,2)}}</td>
                                                <td>
                                                    @php
                                                        $total_cash_in = ($nozle->note_2000*2000)+($nozle->note_500*500)+($nozle->note_200*200)+($nozle->note_100*100)+($nozle->note_50*50)+($nozle->note_20*20)+($nozle->note_10*10)+($nozle->note_5*5)+($nozle->note_2*2)+($nozle->note_1*1);
                                                    @endphp
                                                    {{round($total_cash_in,2)}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="table-responsive">
                                <h5>Nozle Redding</h5>
                                <table class="table table-bordered">
                                    <thead class="text-primary">
                                        @php
                                            $nozles = App\NozleEntryItem::join("nozles","nozles.id","=","nozle_entry_items.nozleId")->join("products","products.id","=","nozle_entry_items.productId")->select("nozles.id","nozles.nozle","products.product")->whereIn("entryId",explode(",",$entryIds))->groupBy('nozleId')->orderBy("nozles.orderNo","ASC")->get();

                                            $products = App\NozleEntryItem::join("products","products.id","=","nozle_entry_items.productId")->select("productId")->whereIn("entryId",explode(",",$entryIds))->groupBy('productId')->orderBy("orderNo","ASC")->get();
                                        @endphp
                                        <tr>
                                            <!-- DATE N1 N2 N3 N4 PETROL TEST DEISAL TEST POWER TEST PETROL RATE DEISAL RATE POWER RATE -->
                                            <th>DATE</th>
                                            @if(count($nozles))
                                                @foreach($nozles as $key => $value)
                                                    <th>{{$value->nozle}}<br>({{$value->product}})</th>
                                                @endforeach
                                            @endif
                                            @if(count($products))
                                                @foreach($products as $key => $value)
                                                    @php
                                                        $product = App\Product::find($value->productId);
                                                    @endphp
                                                    <th>{{$product->product}} Test</th>
                                                @endforeach
                                            @endif
                                            @if(count($products))
                                                @foreach($products as $key => $value)
                                                    @php
                                                        $product = App\Product::find($value->productId);
                                                    @endphp
                                                    <th>{{$product->product}} Rate</th>
                                                @endforeach
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($reports as $key => $value)
                                            <tr>
                                                @php
                                                    $nozle = $value->batch_nozle($value->entryIds);
                                                @endphp
                                                <td>{{date("d M Y", strtotime($value->realdatetime))}}</td>
                                                @if(count($nozles))
                                                    @foreach($nozles as $key => $value)
                                                        @if(isset($nozle['closing_reading'][$value->id]))
                                                            <td>{{$nozle['closing_reading'][$value->id]}}</td>
                                                        @else
                                                            <td></td>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if(count($products))
                                                    @foreach($products as $key => $value)
                                                        @if(isset($nozle['test_qty'][$value->productId]))
                                                            <td>{{$nozle['test_qty'][$value->productId]}}</td>
                                                        @else
                                                            <td></td>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if(count($products))
                                                    @foreach($products as $key => $value)
                                                        @if(isset($nozle['sale_rate'][$value->productId]))
                                                            <td>{{$nozle['sale_rate'][$value->productId]}}</td>
                                                        @else
                                                            <td></td>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="table-responsive">
                                <h5>CASH DETAIL</h5>
                                <table class="table table-bordered">
                                    <thead class="text-primary">
                                        <tr>
                                            <th>DATE</th>
                                            <th>2000</th>
                                            <th>500</th>
                                            <th>200</th>
                                            <th>100</th>
                                            <th>50</th>
                                            <th>20</th>
                                            <th>10</th>
                                            <th>5</th>
                                            <th>2</th>
                                            <th>1</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($reports as $key => $value)
                                            @php
                                                $nozle = $value->batch_nozles($value->entryIds);
                                            @endphp
                                            <tr>
                                                <td>{{date("d M Y", strtotime($value->realdatetime))}}</td>
                                                <td>{{$nozle->note_2000}}</td>
                                                <td>{{$nozle->note_500}}</td>
                                                <td>{{$nozle->note_200}}</td>
                                                <td>{{$nozle->note_100}}</td>
                                                <td>{{$nozle->note_50}}</td>
                                                <td>{{$nozle->note_20}}</td>
                                                <td>{{$nozle->note_10}}</td>
                                                <td>{{$nozle->note_5}}</td>
                                                <td>{{$nozle->note_2}}</td>
                                                <td>{{$nozle->note_1}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="{{ asset('paper') }}/js/core/jquery.min.js"></script>
<script type="text/javascript">
    function deleteBatch(id){
        $.confirm({
            title: 'Alert!',
            content: 'Are you sure to delete batch?',
            buttons: {
                confirm: {
                    text: 'Confirm',
                    btnClass: 'btn-red',
                    action: function(){
                        $.ajax({
                            url: "{{route('cashdetail.deletebatch')}}",
                            type: 'get',
                            data: {'id':id},
                            beforeSend: function() {

                            },
                            success: function(response) {
                                if(response == true){
                                    swal({
                                        title: "Alert!", 
                                        text: "Batch deleted!", 
                                        type: "success"
                                    }).then(function(){ 
                                            location.reload();
                                        }
                                    );
                                }else{
                                    swal({
                                        title: "Alert!", 
                                        text: response, 
                                        type: "error"
                                    }).then(function(){ 
                                        }
                                    );
                                }
                            },
                            error: function(xhr) {
                                
                            }
                        });
                    }
                },
                cancel: function () {}
            }
        });
    }

    function printBatch(batchId){
        $.ajax({
            url: "{{route('cashdetail.printbatch')}}",
            type: 'get',
            data: { 'batchId' : batchId },
            beforeSend: function() {
                
            },
            success: function(response) {
                $.print(response);
            },
            error: function(xhr) {
                
            }
        });
    }
</script>