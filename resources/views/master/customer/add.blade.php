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
                        <h4 class="card-title align-self-center m-1">Customer Add</h4>
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
                                                <select name="state" class="@error('state') is-invalid @enderror form-control">
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
@endsection 

