@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'unverified',
    'title' => 'VERIFY YOUR CASH'
])

@section('content')
<style type="text/css">
    .model-table table tbody tr td,.model-table table thead tr th{
        padding: 5px 7px !important;
    }
</style>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title align-self-center m-1">VERIFY YOUR CASH</h4>
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
                                                    <button class="btn btn-social btn-just-icon btn-sm btn-primary" onclick="openVerifyCashDetailModal('{{base64_encode($value->id)}}','{{$value->note_2000}}','{{$value->note_500}}','{{$value->note_200}}','{{$value->note_100}}','{{$value->note_50}}','{{$value->note_20}}','{{$value->note_10}}','{{$value->note_5}}','{{$value->note_2}}','{{$value->note_1}}');">
                                                        Un-Verified
                                                    </button>
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
<!-- Modal -->
<div class="modal fade" id="verifyCashDetailModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cash Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pt-0 pb-0">
                <div class="table-responsive pb-0 model-table">
                    <table class="table table-bordered text-center">
                        <tbody>
                            <tr>
                                <td>2000</td>
                                <td id="note_2000_count"></td>
                                <td>
                                    <input type="checkbox" class="checkbox" onclick="check_verification();">
                                </td>
                            </tr>
                            <tr>
                                <td>500</td>
                                <td id="note_500_count"></td>
                                <td>
                                    <input type="checkbox" class="checkbox" onclick="check_verification();">
                                </td>
                            </tr>
                            <tr>
                                <td>200</td>
                                <td id="note_200_count"></td>
                                <td>
                                    <input type="checkbox" class="checkbox" onclick="check_verification();">
                                </td>
                            </tr>
                            <tr>
                                <td>100</td>
                                <td id="note_100_count"></td>
                                <td>
                                    <input type="checkbox" class="checkbox" onclick="check_verification();">
                                </td>
                            </tr>
                            <tr>
                                <td>50</td>
                                <td id="note_50_count"></td>
                                <td>
                                    <input type="checkbox" class="checkbox" onclick="check_verification();">
                                </td>
                            </tr>
                            <tr>
                                <td>20</td>
                                <td id="note_20_count"></td>
                                <td>
                                    <input type="checkbox" class="checkbox" onclick="check_verification();">
                                </td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td id="note_10_count"></td>
                                <td>
                                    <input type="checkbox" class="checkbox" onclick="check_verification();">
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td id="note_5_count"></td>
                                <td>
                                    <input type="checkbox" class="checkbox" onclick="check_verification();">
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td id="note_2_count"></td>
                                <td>
                                    <input type="checkbox" class="checkbox" onclick="check_verification();">
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td id="note_1_count"></td>
                                <td>
                                    <input type="checkbox" class="checkbox" onclick="check_verification();">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="entryId" id="entryId">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="verify();" id="verify_button" disabled>Verify</button>
            </div>
        </div>
    </div>
</div>
@endsection
<script type="text/javascript">
    function  openVerifyCashDetailModal(id,note_2000,note_500,note_200,note_100,note_50,note_20,note_10,note_5,note_2,note_1){
        $("#entryId").val(id);
        $("#note_2000_count").html(note_2000);
        $("#note_500_count").html(note_500);
        $("#note_200_count").html(note_200);
        $("#note_100_count").html(note_100);
        $("#note_50_count").html(note_50);
        $("#note_20_count").html(note_20);
        $("#note_10_count").html(note_10);
        $("#note_5_count").html(note_5);
        $("#note_2_count").html(note_2);
        $("#note_1_count").html(note_1);

        $("#verify_button").prop("disabled", true);
        $(".checkbox").prop("checked",false);

        $("#verifyCashDetailModal").modal("show");
    }

    function check_verification(){
        var status = true;
        $(".checkbox").each(function(){
            if($(this).prop("checked") == false){
                status = false;
            }
        })
        if(status){
            $("#verify_button").prop("disabled", false);
        }
        else{
            $("#verify_button").prop("disabled", true);
        }
    }

    function verify(){
        var entryId = $("#entryId").val();

        $.ajax({
            url: "{{route('cashdetail.verifycashdetail')}}",
            type: 'get',
            data: { 'entryId':entryId},
            beforeSend: function() {
                
            },
            success: function(response) {
                $("#verifyCashDetailModal").modal("hide");
                if (response == true) {
                    swal({
                        title: "Alert!", 
                        text: "Cash detail verified!", 
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