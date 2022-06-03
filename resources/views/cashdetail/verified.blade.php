@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'verified',
    'title' => 'PREPARE BATCH'
])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title align-self-center m-1">PREPARE BATCH</h4>
                        <div class="mr-2">
                            <button type="button" class="btn btn-sm btn-warning" onclick="create_batch();"> Create Batch</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                    <tr>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Total Cash Amount</th>
                                        <th class="text-center">Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($cashdetails))
                                        @foreach($cashdetails as $key => $value)
                                            <tr>
                                                <td>{{date("d-M-Y", strtotime($value->realdatetime))}}</td>
                                                <td>{{date("H:i:s", strtotime($value->realdatetime))}}</td>
                                                <td>{{$value->cash_amount}}</td>
                                                <td class="text-center">
                                                    <input type="checkbox" value="{{$value->id}}" class="checkbox" id="index_{{$key+1}}" onclick="verify_selection(this,'{{$key+1}}');" @if($key > 0) disabled @endif>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="{{ asset('paper') }}/js/core/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var key = 0;
        $(".checkbox").prop("checked",false);
        $(".checkbox").each(function(){
            if(key > 0){
                $(this).prop("disabled",true);
            }
            key = parseInt(key)+1;
        })
    })
    function verify_selection(dis,index){
        if($(dis).prop("checked") == true){
            $("#index_" + (parseInt(index)-1)).prop("disabled",true);
            $("#index_" + (parseInt(index)+1)).prop("disabled",false);
        }
        else{
            $("#index_" + (parseInt(index)-1)).prop("disabled",false);
            $("#index_" + (parseInt(index)+1)).prop("disabled",true);
        }
    }

    function create_batch(){
        var entryIds = {};

        var index = 0;
        $("input:checkbox[class=checkbox]:checked").each(function () {
            entryIds[index] = $(this).val();
            index = parseInt(index)+1;
        });

        $.ajax({
            url: "{{route('cashdetail.createbatch')}}",
            type: 'post',
            data: { 'entryIds':entryIds,'_token':'{{csrf_token()}}'},
            beforeSend: function() {
                
            },
            success: function(response) {
                if (response == true) {
                    swal({
                        title: "Alert!", 
                        text: "Batch created!", 
                        type: "success"
                    }).then(function(){ 
                            location.reload();
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
</script>