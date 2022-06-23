@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'home',
    'title' => 'View Entry'
])

@section('content')
<style type="text/css">
    .show-cash-detail-toggle, .enter-cash-detail-toggle{
        display: none;
    }
</style>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <input type="hidden" name="entryId" id="entryId" value="{{$entry->id}}">
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
                        <div class="card-header text-center show-cash-detail-toggle">
                            <h5 class="title">{{ __('CASH DETAIL') }}</h5>
                        </div>
                        <div class="table-responsive show-cash-detail-toggle">
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
                                        <th>{{$total_cash_amount}}</th>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" class="text-center">
                                            <button type="button" class="btn btn-info btn-round" onclick="print_note();">{{ __('PRINT') }}</button>
                                            <a href="{{route('home.downloadpdf', $entry->id)}}" class="btn btn-info btn-round" target="_blank">{{ __('DOWNLOAD PDF') }}</a>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="card-header enter-cash-detail-toggle text-center">
                            <h5 class="title">{{ __('ENTER CASH DETAIL') }}</h5>
                        </div>
                        <div class="table-responsive enter-cash-detail-toggle">
                            <table class="table text-center table-bordered">
                                <thead>
                                    <tr>
                                        <th>DENOMINATION</th>
                                        <th>COUNT</th>
                                        <th>AMOUNT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>2000</td>
                                        <td>
                                            <input type="text" name="count[2000]" class="form-control notes numberprevent" note="2000" value="0" onkeyup="calculate_amount(this);">
                                        </td>
                                        <td id="amount_2000" class="cash_amount"></td>
                                    </tr>
                                    <tr>
                                        <td>500</td>
                                        <td>
                                            <input type="text" name="count[500]" class="form-control notes numberprevent" note="500" value="0" onkeyup="calculate_amount(this);">
                                        </td>
                                        <td id="amount_500" class="cash_amount"></td>
                                    </tr>
                                    <tr>
                                        <td>200</td>
                                        <td>
                                            <input type="text" name="count[200]" class="form-control notes numberprevent" note="200" value="0" onkeyup="calculate_amount(this);">
                                        </td>
                                        <td id="amount_200" class="cash_amount"></td>
                                    </tr>
                                    <tr>
                                        <td>100</td>
                                        <td>
                                            <input type="text" name="count[100]" class="form-control notes numberprevent" note="100" value="0" onkeyup="calculate_amount(this);">
                                        </td>
                                        <td id="amount_100" class="cash_amount"></td>
                                    </tr>
                                    <tr>
                                        <td>50</td>
                                        <td>
                                            <input type="text" name="count[50]" class="form-control notes numberprevent" note="50" value="0" onkeyup="calculate_amount(this);">
                                        </td>
                                        <td id="amount_50" class="cash_amount"></td>
                                    </tr>
                                    <tr>
                                        <td>20</td>
                                        <td>
                                            <input type="text" name="count[20]" class="form-control notes numberprevent" note="20" value="0" onkeyup="calculate_amount(this);">
                                        </td>
                                        <td id="amount_20" class="cash_amount"></td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>
                                            <input type="text" name="count[10]" class="form-control notes numberprevent" note="10" value="0" onkeyup="calculate_amount(this);">
                                        </td>
                                        <td id="amount_10" class="cash_amount"></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>
                                            <input type="text" name="count[5]" class="form-control notes numberprevent" note="5" value="0" onkeyup="calculate_amount(this);">
                                        </td>
                                        <td id="amount_5" class="cash_amount"></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>
                                            <input type="text" name="count[2]" class="form-control notes numberprevent" note="2" value="0" onkeyup="calculate_amount(this);">
                                        </td>
                                        <td id="amount_2" class="cash_amount"></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <input type="text" name="count[1]" class="form-control notes numberprevent" note="1" value="0" onkeyup="calculate_amount(this);">
                                        </td>
                                        <td id="amount_1" class="cash_amount"></td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Total Amount</th>
                                        <th id="total_cash_amount"></th>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3">
                                            <button type="button" class="btn btn-info btn-round" id="note_save_button" onclick="save_note();">{{ __('SAVE') }}</button>
                                            <button type="button" class="btn btn-info btn-round" id="print_button" onclick="print_note();" disabled>{{ __('PRINT') }}</button>
                                            <a href="{{route('home.downloadpdf', $entry->id)}}" class="btn btn-info btn-round" target="_blank" id="download_button" disabled>{{ __('DOWNLOAD PDF') }}</a>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="text-center">
                            @if(auth()->user()->role == 'Admin')
                                @if($entry->id == $latest_entry->id)
                                    <button type="button" class="btn btn-info btn-round" onclick="delete_entry();">{{ __('DELETE') }}</button>
                                    {{--<button type="button" class="btn btn-info btn-round" onclick="open_verify_pin_modal('delete_entry');">{{ __('DELETE') }}</button>--}}
                                @endif
                            @endif
                            @if(!$entry->note_2000 && !$entry->note_500 && !$entry->note_200 && !$entry->note_100 && !$entry->note_50 && !$entry->note_20 && !$entry->note_10 && !$entry->note_5 && !$entry->note_2 && !$entry->note_1 )
                                <button type="submit" class="btn btn-info btn-round" onclick="enter_cash_detail_toggle();">{{ __('ENTER CASH DETAIL') }}</button>
                            @else
                                <button type="submit" class="btn btn-info btn-round" onclick="show_cash_detail_toggle();">{{ __('SHOW CASH DETAIL') }}</button>
                            @endif
                            <a href="{{route('home.list')}}" class="btn btn-info btn-round">{{ __('EXIT') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script type="text/javascript">
    function enter_cash_detail_toggle(){
        $(".enter-cash-detail-toggle").toggle();
    }
    function show_cash_detail_toggle(){
        $(".show-cash-detail-toggle").toggle();
    }
    function calculate_amount(dis){
        var note = $(dis).attr("note");
        var count = $(dis).val();

        var amount = parseFloat(note)*parseFloat(count);

        $("#amount_" + note).html(amount);
        calculate_total_cash_amount();
    }

    function calculate_total_cash_amount(){
        var total_cash_amount = 0;
        $(".cash_amount").each(function(){

            var amount = $(this).html();
            if(!amount){
                amount = 0;
            }

            total_cash_amount = parseFloat(total_cash_amount)+parseFloat(amount);
        })
        console.log(total_cash_amount);

        $("#total_cash_amount").html(total_cash_amount);
    }

    function save_note(){
        var notes = {};
        var entryId = $("#entryId").val();
        var cash_amount = $("#net_sale_amount").html();
        var total_cash_amount = 0;
        $(".notes").each(function(){
            var note = $(this).attr("note");

            if($(this).val()){
                notes[note] = $(this).val();
            }
            else{
                notes[note] = 0;
            }
            var amount = parseFloat(note)*parseFloat(notes[note]);
            total_cash_amount = parseFloat(total_cash_amount)+parseFloat(amount);
        });
        
        if(parseFloat(total_cash_amount) == parseFloat(cash_amount)){
            $.ajax({
                url: "{{route('home.updatenotecount')}}",
                type: 'post',
                data: { 'entryId':entryId,'notes':notes,'_token':'{{csrf_token()}}'},
                beforeSend: function() {
                    
                },
                success: function(response) {
                    if (response == true) {
                        swal({
                            title: "Alert!", 
                            text: "Cash detail saved successfully!", 
                            type: "success"
                        }).then(function(){ 
                                // location.reload();
                                $("#note_save_button").prop("disabled",true);
                                $("#print_button").prop("disabled",false);
                                $("#download_button").attr("disabled",false);
                            }
                        );
                    } else {
                        swal({
                            title: "Alert!", 
                            text: "Someting went wrong!", 
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
        else{
            swal({
                title: "Alert!", 
                text: "Total cash amount not match!", 
                type: "error"
            }).then(function(){ 
                    
                }
            );
        }
    }

    function print_note(){
        var entryId = $("#entryId").val();
        $.ajax({
            url: "{{route('home.print')}}",
            type: 'get',
            data: { 'entryId' : entryId },
            beforeSend: function() {
                
            },
            success: function(response) {
                $.print(response);
            },
            error: function(xhr) {
                
            }
        });
    }

    function delete_entry(){
        var entryId = $("#entryId").val();
        
        $.confirm({
            title: 'Alert!',
            content: 'Are you sure to delete entry?',
            buttons: {
                confirm: {
                    text: 'Confirm',
                    btnClass: 'btn-red',
                    action: function(){
                        $.ajax({
                            url: "{{route('home.delete')}}",
                            type: 'get',
                            data: {'entryId':entryId},
                            beforeSend: function() {

                            },
                            success: function(response) {
                                if(response == '1'){
                                    swal({
                                        title: "Alert!", 
                                        text: "Entry deleted!", 
                                        type: "success"
                                    }).then(function(){ 
                                            window.location.href = "{{route('home.list')}}";
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
</script>