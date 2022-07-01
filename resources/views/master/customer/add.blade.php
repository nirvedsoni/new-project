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
                        <h5 class="card-title align-self-center m-1">Customer Add</h5>
                        <div>
                            <a href="{{ route('home.list') }}" class="btn btn-warning btn-round">List</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="store">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4 align-self-center">
                                                <label for="">Customer Name</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <input type="text" name="customerName"
                                                    class="@error('customerName') is-invalid @enderror form-control"
                                                    placeholder="Enter Customer Name">
                                                @error('customerName')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
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
                                                <input type="text" name="address"
                                                    class="@error('address') is-invalid @enderror form-control"
                                                    placeholder="Enter Address">
                                                @error('address')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
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
                                                <input type="text" name="landmark"
                                                    class="@error('landmark') is-invalid @enderror form-control"
                                                    placeholder="Enter Landmark">
                                                @error('landmark')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
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
                                                <input type="text" name="wallNo"
                                                    class="@error('wallNo') is-invalid @enderror form-control"
                                                    placeholder="Enter Wall No">
                                                @error('wallNo')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
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
                                                <select name="state"
                                                    class="@error('state') is-invalid @enderror form-control">
                                                    <option selected>Choose State...</option>
                                                    @foreach ($sData as $items)
                                                        <option value="{{ $items->stateName }}">{{ $items->stateName }}
                                                        </option>
                                                    @endforeach
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
                                                    @foreach ($cData as $items)
                                                        <option value="{{ $items->cityName }}">{{ $items->cityName }}
                                                        </option>
                                                    @endforeach
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
                                                <input name="advDate" type="date"
                                                    class="@error('advDate') is-invalid @enderror form-control">
                                                @error('advDate')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
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
                                                <input type="text" name="wallRent"
                                                    class="@error('wallRent') is-invalid @enderror form-control"
                                                    placeholder="Enter Wall Rent">
                                                @error('wallRent')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
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
    </style>


    <div class="container">

        <div class="card b">
            <div class="card-body py-0">
                <div class="row">
                    <div class="col-sm-9 pt-0  b-right">
                        <div class="row b-btm text-center">
                            <div class="col-sm-4 b-right">
                                <h5>landmark</h5>
                            </div>
                            <div class="col-sm-4 b-right">
                                <h5>city</h5>
                            </div>
                            <div class="col-sm-4 b-right">
                                <h5>state</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="pic"style="height: 300px;">
                                <h1>haha</h1>
                            </div>
                        </div>
                        <div class="row b">
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-3">plase </div>
                                    <div class="col-sm-6 h6">plasa name</div>
                                </div>

                            </div>
                            <div class="col-sm-3">
                                <div class="row">
                                    <div class="col-sm-6">wall </div>
                                    <div class="col-sm-6 h6">12</div>
                                </div>

                            </div>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-3">Dealer Name </div>
                                    <div class="col-sm-6 h6">plasa name</div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="row">
                                    <div class="col-sm-6">wall Rent </div>
                                    <div class="col-sm-6 h6">12</div>
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-3">Date </div>
                                    <div class="col-sm-6 h6">plasa name</div>
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
                        <div class="row b-left">
                            <div class="col-sm-6 b">
                                <div class="text-center p-1 mb-0">
                                    <h5>12*12</h5>
                                </div>
                            </div>
                            <div class="col-sm-6 b">
                                <div class="text-center p-1 mb-0">
                                    <h5>144</h5>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            {{-- <div class="card-body">
                <div class="col-sm-9" style="height: 400px;" >

                </div>
                <div class="col-sm-3" style="height: 400px; border-left: 1px solid black" >
                    <h1>dfg</h1>
                </div>
            </div> --}}

        </div>


    </div>
@endsection
{{-- <div class="table-responsive">
    <table class="table table-bordered">
        <tbody>
            <tr class="text-center">
                <th scope="col">S.No.</th>
                <th scope="col">Cust. Id</th>
                <th scope="col">Customer Name</th>
                <th scope="col">size</th>
                <th scope="col">SQ.Feet</th>
            </tr>
                <tr class="text-center">
                    <td>sdsdfd</td>
                    <td>sdsdfd</td>
                    <td>sdsdfd</td>
                    <td>sdsdfd</td>
                </tr>
        </tbody>
    </table>
</div>
<div class="table-responsive">
    <table class="table table-bordered">
        <tbody>
            <tr class="text-center">
                <th scope="col">S.No.</th>
                <th scope="col">Cust. Id</th>
                <th scope="col">Nos</th>
                <th scope="col">Size</th>
                <th scope="col">Square Feet</th>
            </tr>
                <tr class="text-center">
                    <td>sdsdd</td>
                    <td>sdsdd</td>
                    <td>sdsdd</td>
                    <td>sdsdd</td>
                </tr>
        </tbody>

    </table>
</div> --}}

{{-- wall number shor filter --}}
