@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'datewisereport',
    'title' => 'Date Wise Report',
])
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        {{-- <h4 class="card-title align-self-center m-1">Date Wise Report</h4> --}}
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-beyween">
                            <div class="col">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-5 mt-2 text-center">
                                            <label for="">Landmark</label>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="form-group">
                                                <div class="row">
                                                    <select name="state" id="optVal" class="form-control">
                                                        <option value="">Select here...</option>
                                                        @foreach ($data as $items)
                                                            <option value="{{ $items->landmark }}" id="">
                                                                {{ $items->landmark }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-3 align-self-center  mt-2">
                                            <label for="searchFromDate">From</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="date" name="searchFromDate" id="searchFromDate"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-3 align-self-center mt-2">
                                            <label for="searchToDate">To</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="date" name="searchToDate" id="searchToDate"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button onclick="custDetail();" class="btn btn-primary">View
                                </button>
                            </div>
                        </div>

                        <div class="container">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr class="text-primary">
                                            <th scope="col">S.NO.</th>
                                            <th scope="col">Customer Name</th>
                                            <th scope="col">Customer Address</th>
                                            <th scope="col">Landmark</th>
                                            <th scope="col">Adv. Date</th>
                                            <th scope="col" class="text-center">Print</th>
                                        </tr>
                                    </thead>
                                    <tbody id="customerData">
                                        <tr>
                                            <th class="text-danger text-center" colspan="6">Empty</th>
                                        </tr>

                                    </tbody>

                                </table>
                                <div class="col-sm-2 offset-10">
                                    <button type="submit" class="btn btn-sacondary d-none" id="print"
                                        onclick='printDiv()'>Print
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    function printDiv() {
        let customerIds = new Array();

        $(".chkCustomerId").each(function() {
            if ($(this).prop("checked") == true) {
                customerIds.push($(this).val());
            }
        });


        console.log('cust IDs=>', customerIds);

        if (customerIds.length == 0) {
            alert('Please Select Customers and size');
        } else {
            $.ajax({
                url: "{{ route('report.datewisereport.print') }}",
                type: 'get',
                data: {
                    'custIds': customerIds
                },
                beforeSend: function() {

                },
                success: function(response) {
                    $.print(response);
                    console.log(response);
                },
                error: function(err) {
                    console.log('eroor => ', err);

                }
            });
        }
        // window.print();
    }


    function custDetail() {

        let e = document.getElementById("optVal");
        let landmarkVal = e.options[e.selectedIndex].value;

        var fromDate = $("#searchFromDate").val();
        var toDate = $("#searchToDate").val();

        if (landmarkVal) {
            $.ajax({
                url: "{{ route('report.datewisereport.data') }}",
                type: 'get',
                data: {
                    'landmark': landmarkVal,
                    'fromDate': fromDate,
                    'toDate': toDate
                },
                beforeSend: function() {

                },
                success: function(response) {
                    $("#customerData").html(response);
                    $("#print").removeClass('d-none');

                },
                error: function(err) {
                    console.log('eroor => ', err);

                }
            });
        } else {
            $("#print").addClass('d-none');

            $("#customerData").html(` <tr class="text-danger">
                                                <th class="text-center" colspan="6">Empty</th>
                                            </tr>`);

        };

    }
</script>
