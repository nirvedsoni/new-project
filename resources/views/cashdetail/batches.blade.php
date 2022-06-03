@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'batches',
    'title' => 'Batches'
])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title align-self-center m-1">Batches</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                          </div>
                          <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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