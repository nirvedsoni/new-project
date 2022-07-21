@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'totalreport',
    'title' => 'Total Report',
])
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        {{-- <h4 class="card-title align-self-center m-1">Total Report</h4> --}}
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
                                        <div class="col-sm-3 align-self-center mt-2">
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
                                        <div class="col-sm-3 align-self-center  mt-2">
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
                                <button onclick="totalReport();" class="btn btn-primary">View</button>
                            </div>
                        </div>


                        <div class="pt-4" id="totalData">
                            <div class="h6 pb-4">
                                <div class="text-danger text-center">No Data</div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn print btn-sacondary d-none m-2 " id="print"
                                onclick='printDiv()'>Print</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        
        $(function() {
            
            todaysDate();

            function todaysDate() {
                let d = new Date();
            var datestring = d.getFullYear() + "-" + ("0" + (d.getMonth() + 1)).slice(-2) + "-" + ("0" + d.getDate()).slice(
                -2);

            document.getElementById("searchFromDate").value = datestring;
            document.getElementById("searchToDate").value = datestring;
            console.log(datestring);

            }

        });




        function totalReport() {

            let e = document.getElementById("optVal");
            let landmarkVal = e.options[e.selectedIndex].value;

            var fromDate = $("#searchFromDate").val();
            var toDate = $("#searchToDate").val();

            if (landmarkVal) {

                $.ajax({
                    url: "{{ route('report.totalreport.data') }}",
                    type: 'get',
                    data: {
                        'landmark': landmarkVal,
                        'fromDate': fromDate,
                        'toDate': toDate
                    },
                    beforeSend: function() {

                    },
                    success: function(response) {
                        $("#totalData").html(response);
                        $("#print").removeClass('d-none');
                    },
                    error: function(err) {
                        console.log('eroor => ', err);

                    }
                });

            } else {
                $("#print").addClass('d-none');

                $("#totalData").html(`  <div class="h6 pb-4">
                                         <div class="text-danger text-center">No Data</div>
                                     </div>`);



            }


        }

        function printDiv() {

            let e = document.getElementById("optVal");
            let landmarkVal = e.options[e.selectedIndex].value;

            var fromDate = $("#searchFromDate").val();
            var toDate = $("#searchToDate").val();

            if (landmarkVal) {

                $.ajax({
                    url: "{{ route('report.totalreport.data') }}",
                    type: 'get',
                    data: {
                        'landmark': landmarkVal,
                        'fromDate': fromDate,
                        'toDate': toDate
                    },
                    beforeSend: function() {

                    },
                    success: function(response) {
                        $.print(response);
                    },
                    error: function(err) {
                        console.log('eroor => ', err);

                    }
                });

            }


        }
    </script>
@endsection
