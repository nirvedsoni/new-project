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
                        <h4 class="card-title align-self-center m-1">Date Wise Report</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-lg-2">
                                <label for="">Landmark</label>
                                <select name="state" id="optVal" class="form-control">
                                    <option value="">Select here...</option>
                                    @foreach ($data as $items)
                                        <option value="{{ $items->landmark }}" id="">
                                            {{ $items->landmark }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-2">
                                <label for="searchFromDate">From</label>
                                <input type="date" name="searchFromDate" id="searchFromDate" class="form-control">
                            </div>
                            <div class="form-group col-lg-2">
                                <label for="searchToDate">To</label>
                                <input type="date" name="searchToDate" id="searchToDate" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <button onclick="custDetail();" class="btn btn-primary mt-4">View
                                </button>
                            </div>
                        </div>
                        <hr>

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
                                            <td class="text-danger text-center" colspan="6">Empty</td>
                                        </tr>

                                    </tbody>

                                </table>
                                <div class="col-sm-2 offset-10">
                                    <button type="submit" class="btn btn-sacondary" id="print"
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
                error: function(E) {
                    console.log(E);

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

        $.ajax({
            url: "{{ route('report.datewisereport.data') }}",
            type: 'get',
            data: {
                'landmark': landmarkVal,
                'fromDate': fromDate,
                'toDate' : toDate
            },
            beforeSend: function() {

            },
            success: function(response) {
                $("#customerData").html(response);
            },
            error: function(xhr) {

            }
        });
    }
</script>