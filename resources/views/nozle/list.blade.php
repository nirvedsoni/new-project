@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'nozle',
    'title' => 'Nozles'
])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title align-self-center m-1">Dealer</h4>
                        <div class="mr-2">
                            <button type="button" data-toggle="modal" data-target="#addNozle" title="Add Nozle" class="btn btn-sm btn-warning" onclick="resetAddNozleModal();"> Add</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4 align-self-center">
                                                <label for="">Dealer</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" placeholder="Enter Dealer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4 align-self-center float-start">
                                                <label for="">Contact No.</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" placeholder="Enter Contact No.">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center ">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4 align-self-center">
                                                <label for="">Address</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" placeholder="Enter Address">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4 align-self-center">
                                                <label for="">Contact Person</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" placeholder="Enter Contact Person">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center ">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4 align-self-center float-start">
                                                <label for="">Email id</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <input type="email" class="form-control" placeholder="Enter Email id">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6"></div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- Modal -->
<div class="modal fade" id="addNozle" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Nozle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <label for="nozle">Nozle</label>
                        <input type="text" class="form-control" placeholder="Nozle" name="nozle" id="nozle" required autofocus>
                        <span class="invalid-feedback" role="alert" id="nozleError" style="display:none;">
                            <strong>{{ __('nozle is required') }}</strong>
                        </span>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="openning_reading">Opennig Reading</label>
                        <input type="text" class="form-control decimalnumberprevent" placeholder="Openning Reading" name="openning_reading" id="openning_reading" required autofocus>
                        <span class="invalid-feedback" role="alert" id="openning_readingError" style="display:none;">
                            <strong>{{ __('Openning reading is required') }}</strong>
                        </span>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="productId">Product</label>
                        <select class="form-control" name="productId" id="productId">
                            <option value="">Select</option>
                            @if(count($products))
                                @foreach($products as $key => $value)
                                    <option value="{{$value->id}}">{{$value->product}}</option>
                                @endforeach
                            @endif
                        </select>
                        <span class="invalid-feedback" role="alert" id="productIdError" style="display:none;">
                            <strong>{{ __('Product is required') }}</strong>
                        </span>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="orderNo">Order</label>
                        <input type="text" class="form-control numberprevent" placeholder="Order" name="orderNo" id="orderNo">
                        <span class="invalid-feedback" role="alert" id="orderNoError" style="display:none;">
                            <strong>{{ __('Order is required') }}</strong>
                        </span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="save_nozle();">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="editNozleModel" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Nozle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="editId">
                <div class="row form-group">
                    <div class="col-md-12 mb-2">
                        <label for="nozle">Nozle</label>
                        <input type="text" class="form-control" placeholder="Nozle" name="nozle" id="editnozle" required autofocus>
                        <span class="invalid-feedback" role="alert" id="editnozleError" style="display:none;">
                            <strong>{{ __('nozle is required') }}</strong>
                        </span>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="productId">Product</label>
                        <select class="form-control" name="productId" id="editproductId">
                            <option value="">Select</option>
                            @if(count($products))
                                @foreach($products as $key => $value)
                                    <option value="{{$value->id}}">{{$value->product}}</option>
                                @endforeach
                            @endif
                        </select>
                        <span class="invalid-feedback" role="alert" id="editproductIdError" style="display:none;">
                            <strong>{{ __('Product is required') }}</strong>
                        </span>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="orderNo">Order</label>
                        <input type="text" class="form-control numberprevent" placeholder="Order" name="orderNo" id="editorderNo">
                        <span class="invalid-feedback" role="alert" id="orderNoError" style="display:none;">
                            <strong>{{ __('Order is required') }}</strong>
                        </span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="update_nozle();">Update</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function resetAddNozleModal(){
    $("#nozle").val('');
    $("#openning_reading").val('');
    $("#productId").val('');
    $("#orderNo").val('');
}

function save_nozle(){
    var nozle = $("#nozle").val();
    var openning_reading = $("#openning_reading").val();
    var productId = $("#productId").val();
    var orderNo = $("#orderNo").val();

    if(!nozle){
        $("#nozleError").show();
        return false;
    }
    else{
        $("#nozleError").hide();
    }
    if(!openning_reading){
        $("#openning_readingError").show();
        return false;
    }
    else{
        $("#openning_readingError").hide();
    }
    if(!productId){
        $("#productIdError").show();
        return false;
    }
    else{
        $("#productIdError").hide();
    }

    $.ajax({
        url: "{{route('nozle.store')}}",
        type: 'post',
        data: { 'nozle':nozle,'openning_reading':openning_reading,'productId':productId,'orderNo':orderNo,'_token':'{{csrf_token()}}'},
        beforeSend: function() {
            
        },
        success: function(response) {
            $("#addNozle").modal("hide");
            if (response == true) {
                swal({
                    title: "Alert!", 
                    text: "Nozle saved successfully!", 
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

function openEditNozleModal(id,nozle,productId,orderNo){
    $("#editId").val(id);
    $("#editnozle").val(nozle);
    $("#editproductId").val(productId);
    $("#editorderNo").val(orderNo);
    
    $("#editNozleModel").modal("show");
}


function update_nozle(){
    var id = $("#editId").val();
    var nozle = $("#editnozle").val();
    var productId = $("#editproductId").val();
    var orderNo = $("#editorderNo").val();

    if(!nozle){
        $("#nozleError").show();
        return false;
    }
    else{
        $("#nozleError").hide();
    }
    
    if(!productId){
        $("#productIdError").show();
        return false;
    }
    else{
        $("#productIdError").hide();
    }

    $.ajax({
        url: "{{route('nozle.update')}}",
        type: 'post',
        data: { 'id':id,'nozle':nozle,'productId':productId,'orderNo':orderNo,'_token':'{{csrf_token()}}'},
        beforeSend: function() {
            
        },
        success: function(response) {
            $("#editNozleModel").modal("hide");
            if (response == true) {
                swal({
                    title: "Alert!", 
                    text: "Nozle updated successfully!", 
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

function deleteNozle(id){
    $.confirm({
        title: 'Alert!',
        content: 'Are you sure to delete nozle?',
        buttons: {
            confirm: {
                text: 'Confirm',
                btnClass: 'btn-red',
                action: function(){
                    $.ajax({
                        url: "{{route('nozle.delete')}}",
                        type: 'get',
                        data: {'id':id},
                        beforeSend: function() {

                        },
                        success: function(response) {
                            if(response == '1'){
                                swal({
                                    title: "Alert!", 
                                    text: "Nozle data deleted!", 
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

function updateStatus(id,status){
    var msg = ((status == 1) ? "De-Activate" : "Activate");
    var btncolor = ((status == 1) ? "btn-red" : "btn-green");
    $.confirm({
        title: 'Alert!',
        content: 'Are you sure to ' + msg + ' nozle?',
        buttons: {
            confirm: {
                text: 'Confirm',
                btnClass: btncolor,
                action: function(){
                    $.ajax({
                        url: "{{route('nozle.update_status')}}",
                        type: 'get',
                        data: {'id':id,'status':status},
                        beforeSend: function() {

                        },
                        success: function(response) {
                            if(response == '1'){
                                swal({
                                    title: "Alert!", 
                                    text: "Nozle data " + msg + "d!", 
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
/*Project, End*/
</script>