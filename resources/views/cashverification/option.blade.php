@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'cashverification',
    'title' => 'Cash Verification',
])
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title align-self-center m-1">Customer Page</h4>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row justify-content-beyween">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-5 align-self-center">
                                                <label for="">Customer Name</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" placeholder="Enter Customer Name">
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
                                    <button type="submit" class="btn btn-primary">View</button>
                                </div>
                            </div>
                        </form>
                        <hr>

                        <div class="container">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr class="text-primary">
                                            <th scope="col">Id</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">State</th>
                                            <th scope="col">State</th>
                                            <th scope="col">State</th>
                                            <th scope="col">City</th>
                                            <th scope="col" class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>Otto</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                            <td class="text-center">
                                                <div class="">
                                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>Thornton</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                            <td class="text-center">
                                                <div class="">
                                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Larry the Bird</td>
                                            <td>@twitter</td>
                                            <td>@twitter</td>
                                            <td>@twitter</td>
                                            <td>@twitter</td>
                                            <td class="text-center">
                                                <div class="">
                                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                                </div>
                                                
                                            </td>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="col-sm-2 offset-10">
                                    <button type="submit" class="btn btn-sacondary">Print</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
