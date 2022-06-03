@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'home',
    'title' => 'Home',
])

@section('content')
    <div class="content">
        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('error') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title align-self-center m-1">Customer Page</h4>
                        <div>
                            <a href="{{ route('home.list') }}" class="btn btn-warning btn-round">List</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="store" >
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4 align-self-center">
                                                <label for="">Customer Name</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <input type="text" name="customerName" class="form-control" placeholder="Enter Customer Name">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4 align-self-center">
                                                <label for="">Address</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <input type="text" name="address" class="form-control" placeholder="Enter Address">
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
                                                <label for="">Landmark</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <input type="text" name="landmark" class="form-control" placeholder="Enter Landmark">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4 align-self-center">
                                                <label for="">Wall No.</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <input type="text" name="wallNo" class="form-control" placeholder="Enter Wall No">
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
                                                <label for="inputState">State</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <select name="state" id="inputState" class="form-control">
                                                    <option selected>Choose State...</option>
                                                    <option>Madhya Pradesh</option>
                                                    <option>Uttar Pradesh</option>
                                                    <option>Maharashrat</option>
                                                    <option>Goa</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4 align-self-center">
                                                <label for="inputState">City</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <select name="City" id="inputState" class="form-control">
                                                    <option selected>Choose City...</option>
                                                    <option>Jabalpur</option>
                                                    <option>kanpur</option>
                                                    <option>bhopal</option>
                                                    <option>Indore</option>
                                                </select>
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
                                                <label for="">Adv. Date</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <input name="advDate" type="date" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4 align-self-center">
                                                <label for="">Wall Rent</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <input type="text" name="wallRent" class="form-control" placeholder="Enter Wall Rent">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" id="save_booth_button" onclick="save_booth();">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script type="text/javascript">
 
function save_booth(){
    $("#save_booth_button").prop("disabled",true);
    var boothNo = $("#boothNo").val();
    var boothName = $("#boothName").val();
    var village = $("#village").val();
    var firstName = $("#firstName").val();
    var lastName = $("#lastName").val();
    var mobileNo = $("#mobileNo").val();
    var cast = $("#cast").val();
    var otherscast = $("#otherscast").val();
    var religion = $("#religion").val();
    var othersreligion = $("#othersreligion").val();
    var category = $("#category").val();
    var otherscategory = $("#otherscategory").val();
    var occupation = $("#occupation").val();
    var othersoccupation = $("#othersoccupation").val();
    var partyName = $("#partyName").val();
    var otherspartyname = $("#otherspartyname").val();
    var politicalResponsibility = $("#politicalResponsibility").val();
    var remark = $("#remark").val();

</script>
