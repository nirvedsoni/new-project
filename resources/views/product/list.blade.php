@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'product',
    'title' => 'Products',
])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="card-title align-self-center m-1">Products</h4>
                            <div class="mr-2">
                                <button type="button" data-toggle="modal" data-target="#addProduct" title="Add Product"
                                    class="btn btn-sm btn-warning" onclick="resetAddProductModal();"> Add</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-3 align-self-center">
                                                <label for="inputState">State Name</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" name="stateName" class="form-control"
                                                    placeholder="Enter State Name">
                                            </div>
                                            <div class="col-sm-2">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="container">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr class="text-primary">
                                                                <th scope="col">Id</th>
                                                                <th scope="col">State Name</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">1</th>
                                                                <td>Mark</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">2</th>
                                                                <td>Jacob</td>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">3</th>
                                                                <td>Larry the Bird</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 text-center">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-3 align-self-center float-start">
                                                            <label for="">State Name</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <select id="inputState" class="form-control">
                                                                    <option selected>Choose State...</option>
                                                                    <option>Madhya Pradesh</option>
                                                                    <option>Uttar Pradesh</option>
                                                                    <option>Maharashrat</option>
                                                                    <option>Goa</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-3 align-self-center">
                                                            <label for="">City Name</label>

                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <select id="inputState" class="form-control">
                                                                    <option selected>Choose City...</option>
                                                                    <option>Madhya Pradesh</option>
                                                                    <option>Uttar Pradesh</option>
                                                                    <option>Maharashrat</option>
                                                                    <option>Goa</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-3 align-self-center">
                                                            <label for="">City Code</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="number" class="form-control"
                                                                placeholder="Enter City Code">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Submit</button>

                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="container">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr class="text-primary">
                                                                <th scope="col">Id</th>
                                                                <th scope="col">State Name</th>
                                                                <th scope="col">City Name</th>
                                                                <th scope="col">City Code</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">1</th>
                                                                <td>Mark</td>
                                                                <td>Mark</td>
                                                                <td>Mark</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">2</th>
                                                                <td>Jacob</td>
                                                                <td>Jacob</td>
                                                                <td>Jacob</td>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">3</th>
                                                                <td>Larry the Bird</td>
                                                                <td>Larry the Bird</td>
                                                                <td>Larry the Bird</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
