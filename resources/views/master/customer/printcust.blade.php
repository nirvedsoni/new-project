<style type="text/css">
    @media print {
        .print-div {
            color: black;
            /* padding: 40px 40px; */
            padding: 80px 40px 40px;
        }

        .page-break {
            page-break-after: always;
        }

        /* @page {
            margin: 2cm;
        } */

        .table-bordered thead tr th,
        .table-bordered tbody tr td,
        .table-bordered tbody tr th,
        .table-bordered tfoot tr td,
        .table-bordered tfoot tr th {
            border: 1px solid black !important;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0 6px 10px -4px rgba(0, 0, 0, 0.15);
            background-color: #FFFFFF;
            color: #252422;
            margin-bottom: 20px;
            position: relative;
            border: 0 none;
            -webkit-transition: transform 300ms cubic-bezier(0.34, 2, 0.6, 1), box-shadow 200ms ease;
            -moz-transition: transform 300ms cubic-bezier(0.34, 2, 0.6, 1), box-shadow 200ms ease;
            -o-transition: transform 300ms cubic-bezier(0.34, 2, 0.6, 1), box-shadow 200ms ease;
            -ms-transition: transform 300ms cubic-bezier(0.34, 2, 0.6, 1), box-shadow 200ms ease;
            transition: transform 300ms cubic-bezier(0.34, 2, 0.6, 1), box-shadow 200ms ease;
        }

        .card-body {
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            padding: 1.25rem;
        }

        .row {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
        }

        .col,
        .col-1,
        .col-10,
        .col-11,
        .col-12,
        .col-2,
        .col-3,
        .col-4,
        .col-5,
        .col-6,
        .col-7,
        .col-8,
        .col-9,
        .col-auto,
        .col-lg,
        .col-lg-1,
        .col-lg-10,
        .col-lg-11,
        .col-lg-12,
        .col-lg-2,
        .col-lg-3,
        .col-lg-4,
        .col-lg-5,
        .col-lg-6,
        .col-lg-7,
        .col-lg-8,
        .col-lg-9,
        .col-lg-auto,
        .col-md,
        .col-md-1,
        .col-md-10,
        .col-md-11,
        .col-md-12,
        .col-md-2,
        .col-md-3,
        .col-md-4,
        .col-md-5,
        .col-md-6,
        .col-md-7,
        .col-md-8,
        .col-md-9,
        .col-md-auto,
        .col-sm,
        .col-sm-1,
        .col-sm-10,
        .col-sm-11,
        .col-sm-12,
        .col-sm-2,
        .col-sm-3,
        .col-sm-4,
        .col-sm-5,
        .col-sm-6,
        .col-sm-7,
        .col-sm-8,
        .col-sm-9,
        .col-sm-auto,
        .col-xl,
        .col-xl-1,
        .col-xl-10,
        .col-xl-11,
        .col-xl-12,
        .col-xl-2,
        .col-xl-3,
        .col-xl-4,
        .col-xl-5,
        .col-xl-6,
        .col-xl-7,
        .col-xl-8,
        .col-xl-9,
        .col-xl-auto {
            position: relative;
            width: 100%;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
        }

        .col-sm-1 {
            -ms-flex: 0 0 8.333333%;
            flex: 0 0 8.333333%;
            max-width: 8.333333%;
        }

        .col-sm-2 {
            -ms-flex: 0 0 16.666667%;
            flex: 0 0 16.666667%;
            max-width: 16.666667%;
        }

        .col-sm-3 {
            -ms-flex: 0 0 25%;
            flex: 0 0 25%;
            max-width: 25%;
        }

        .col-sm-4 {
            -ms-flex: 0 0 33.333333%;
            flex: 0 0 33.333333%;
            max-width: 33.333333%;
        }

        .col-sm-5 {
            -ms-flex: 0 0 41.666667%;
            flex: 0 0 41.666667%;
            max-width: 41.666667%;
        }

        .col-sm-6 {
            -ms-flex: 0 0 50%;
            flex: 0 0 50%;
            max-width: 50%;
        }

        .col-sm-7 {
            -ms-flex: 0 0 58.333333%;
            flex: 0 0 58.333333%;
            max-width: 58.333333%;
        }

        .col-sm-8 {
            -ms-flex: 0 0 66.666667%;
            flex: 0 0 66.666667%;
            max-width: 66.666667%;
        }

        .col-sm-9 {
            -ms-flex: 0 0 75%;
            flex: 0 0 75%;
            max-width: 75%;
        }

        .col-sm-10 {
            -ms-flex: 0 0 83.333333%;
            flex: 0 0 83.333333%;
            max-width: 83.333333%;
        }

        .col-sm-12 {
            -ms-flex: 0 0 100%;
            flex: 0 0 100%;
            max-width: 100%;
        }

        .col-sm-11 {
            -ms-flex: 0 0 91.666667%;
            flex: 0 0 91.666667%;
            max-width: 91.666667%;
        }

        .b-btm {
            border-bottom: 1px solid black;
        }

        .b-right {
            border-right: 1px solid black;
            padding-top: 10px;
        }

        .b-left {
            border-left: 1px solid black;

        }

        .b {
            border: 1px solid black;
            border-radius: 0px;
        }

        .pb-0,
        .py-0 {
            padding-bottom: 0 !important;
        }

        .pt-0,
        .py-0 {
            padding-top: 0 !important;
        }

        h6,
        .h6 {
            font-size: 1em;
            font-weight: 700;
            text-transform: uppercase;
        }

        .pt-2,
        .py-2 {
            padding-top: .5rem !important;
        }

       .pt1{
        padding-top: 10px;
        }

    }
</style>



@if (count($customersData))
    @foreach ($customersData as $key => $value)
        <div class="print-div">

            <div class="container">
                <div class="card b" style="border: 1px solid black;  border-radius: 0px; ">
                    <div class="card-body py-0">
                        <div class="row">
                            <div class="col-sm-9 pt-0  b-right">
                                <div class="row b-btm text-center">
                                    <div class="col-sm-4 b-right">
                                        <h5 class="color-black">{{ $value->landmark }}</h5>
                                    </div>
                                    <div class="col-sm-4 b-right">
                                        <h5>{{ $value->city }}</h5>
                                    </div>
                                    <div class="col-sm-4 b-right">
                                        <h5>{{ $value->state }}</h5>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="pic"style="height: 500px;">
                                        <h1></h1>
                                    </div>
                                </div>
                                <div class="row b  pt-2">
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-3">Place </div>
                                            <div class="col-sm-6 h6">{{ $value->address }}</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="row">
                                            <div class="col-sm-7">wall No. </div>
                                            <div class="col-sm-5 h6">{{ $value->wallNo }}</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-3">Customer </div>
                                            <div class="col-sm-6 h6">{{ $value->customerName }}</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="row">
                                            <div class="col-sm-7">wall Rent </div>
                                            <div class="col-sm-5 h6">{{ $value->wallRent }}</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-3">Date </div>
                                            <div class="col-sm-6 h6">{{ $value->advDate }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="row b-btm text-center">
                                    <div class="col-sm-6 b-right">
                                        <h5>size</h5>
                                    </div>
                                    <div class="col-sm-6 b-right">
                                        <h5>SQ.FEET</h5>
                                    </div>
                                </div>
                                @php
                                    $customerSizes = App\size::where('cust_id', $value->cust_id)->get();
                                @endphp
                                @foreach ($customerSizes as $skey => $svalue)
                                    <div class="row b-left">
                                        <div class="col-sm-6 b">
                                            <div class="text-center pt1">
                                                <h5>{{ $svalue->size }}</h5>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 b">
                                            <div class="text-center pt1">
                                                <h5>{{ $svalue->squareFeet }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if ($loop->even)
                <div class="page-break"></div>
                {{-- also use this <div style="break-after:page"></div> --}}
            @endif
        </div>
    @endforeach
@endif
