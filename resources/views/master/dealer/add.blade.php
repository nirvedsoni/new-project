@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'dealer',
    'title' => 'Dealer',
])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="card-title align-self-center m-1">Dealer</h4>
                            {{-- <div class="mr-2">
                            <button type="button" data-toggle="modal" data-target="#addNozle" title="Add Nozle" class="btn btn-sm btn-warning" onclick="resetAddNozleModal();"> Add</button>
                        </div> --}}
                            <div>
                                <a href="{{ route('dealer.list') }}" class="btn btn-warning btn-round">List</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="store">
                                @csrf
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-4 align-self-center">
                                                    <label for="">Dealer</label>
                                                </div>
                                                <div class="col-sm-7">
                                                    <input type="text" name="dealerName"
                                                        class="@error('dealerName') is-invalid @enderror form-control"
                                                        placeholder="Enter Dealer">
                                                    @error('dealerName')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
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
                                                    <input type="text" name="contactNo"
                                                        class="@error('contactNo') is-invalid @enderror form-control"
                                                        placeholder="Enter Contact No.">
                                                    @error('contactNo')
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-4 align-self-center">
                                                    <label for="">Contact Person</label>
                                                </div>
                                                <div class="col-sm-7">
                                                    <input type="text" name="contactPerson"
                                                        class="@error('contactPerson') is-invalid @enderror form-control"
                                                        placeholder="Enter Contact Person">
                                                    @error('contactPerson')
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
                                                    <label for="">Email id</label>
                                                </div>
                                                <div class="col-sm-7">
                                                    <input type="email" name="dealerEmail"
                                                        class="@error('dealerEmail') is-invalid @enderror form-control"
                                                        placeholder="Enter Email id">
                                                    @error('dealerEmail')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
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
