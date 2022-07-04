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
                        <h4 class="card-title align-self-center m-1">Total Report</h4>
                    </div>  
                    <div class="card-body">
                        <div class="row justify-content-beyween">
                            <div class="col-md-4">
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
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-3 align-self-center">
                                            <label for="searchFromDate">From</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="date" name="searchFromDate" id="searchFromDate"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-3 align-self-center">
                                            <label for="searchToDate">to</label>
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

                        <hr>

                        <div id="totalData">

                        </div>
                        <div class="col-sm-2 offset-10">
                            <button type="submit" class="btn print btn-sacondary" id="print" onclick='printDiv()'>Print
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    function totalReport() {

        let e = document.getElementById("optVal");
        let landmarkVal = e.options[e.selectedIndex].value;

        var fromDate = $("#searchFromDate").val();
        var toDate = $("#searchToDate").val();

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
            },
            error: function(xhr) {

            }
        });
    }

    function printDiv() {

      
    }
</script>
