@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'datewisereport',
    'title' => 'Date Wise Report',
])
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title align-self-center m-1">Date Wise Report</h4>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-beyween">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 align-self-center">
                                            <label for="">Customer Name</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <select name="state" id="optVal" class="form-control">
                                                    <option value="">Select here...</option>
                                                    @foreach ($data as $items)
                                                        <option value="{{ $items->cust_id }}" id="">
                                                            {{ $items->landmark }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-3 align-self-center">
                                            <label for="">From</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-3 align-self-center">
                                            <label for="">To</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button onclick="custDetail();" class="btn btn-primary">View
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
                                            <th scope="col">Cust.Id</th>
                                            <th scope="col">Customer Name</th>
                                            <th scope="col">Customer Address</th>
                                            <th scope="col">Landmark</th>
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
        let sizeIds = new Array();

        $(".chkCustomerId").each(function() {
            if ($(this).prop("checked") == true) {
                customerIds.push($(this).val());
            }
        });

        $(".chkSizeId").each(function() {
            if ($(this).prop("checked") == true) {
                sizeIds.push($(this).val());
            }
        });

        console.log('cust IDs=>', customerIds);
        console.log('size IDs=>', sizeIds);

        if (customerIds.length == 0 || sizeIds.length == 0) {
            alert('Please Select Customers and size');
        } else {
            $.ajax({
                url: "{{ route('report.datewisereport.print') }}",
                type: 'get',
                data: {
                    'custIds': customerIds,
                    'sIds': sizeIds
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
        let optionValue = e.options[e.selectedIndex].value;

        console.log('optionValue =>', optionValue)

        $.ajax({
            url: "{{ route('report.datewisereport.data') }}",
            type: 'get',
            data: {
                'optionValue': optionValue
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
