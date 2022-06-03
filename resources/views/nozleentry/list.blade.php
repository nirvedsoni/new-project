@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'home',
    'title' => 'Nozle Entries',
])

@section('content')  
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="card-title align-self-center m-1">Customer Table</h4>
                            @if (Session::get('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('status') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close">dss</button>
                                </div>
                            @endif
                            <div>
                                <a href="{{ route('home.add') }}" class="btn btn-warning btn-round">Add New</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('home.list') }}">
                                {{-- <div class="form-row">
                                    <div class="form-group col-lg-2">
                                        <label for="searchFromDate">From Date</label>
                                        <input type="date" name="searchFromDate" id="searchFromDate"
                                            value="{{ $searchFromDate }}" class="form-control">
                                    </div>
                                    <div class="form-group col-lg-2">
                                        <label for="searchToDate">To Date</label>
                                        <input type="date" name="searchToDate" id="searchToDate" value="{{ $searchToDate }}"
                                            class="form-control">
                                    </div>
                                    <div class="form-group col-lg-2 col-sm-3">
                                        <button title="Search" class="btn btn-social btn-just-icon btn-md btn-primary mt-4"
                                            type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div> --}}
                            </form>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr class="text-primary">
                                            <th scope="col">Id</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">address</th>
                                            <th scope="col">landmark</th>
                                            <th scope="col">wallNo</th>
                                            <th scope="col">state</th>
                                            <th scope="col">City</th>
                                            <th scope="col">advDate</th>
                                            <th scope="col">wallRent</th>
                                            <th scope="col" class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $items)
                                            <tr>
                                                <th scope="row">{{ $items->id }}</th>
                                                <td>{{ $items->customerName }}</td>
                                                <td>{{ $items->address }}</td>
                                                <td>{{ $items->landmark }}</td>
                                                <td>{{ $items->wallNo }}</td>
                                                <td>{{ $items->state }}</td>
                                                <td>{{ $items->city }}</td>
                                                <td>{{ $items->advDate }}</td>
                                                <td>{{ $items->wallRent }}</td>
                                                <td class="text-center">
                                                    <button title="Size" data-toggle="modal" data-target="#exampleModal"
                                                        class="btn btn-social btn-just-icon btn-sm btn-primary">
                                                        size
                                                    </button>
                                                    <button title="Edit" data-toggle="modal" data-target="#exampleModal"
                                                        class="btn btn-social btn-just-icon btn-sm btn-success">
                                                        <i class="fa fa-pencil"></i>
                                                    </button>
                                                    <button title="Delete"
                                                        class="btn btn-social btn-just-icon btn-sm btn-danger">
                                                        {{-- <button title="Delete" class="btn btn-social btn-just-icon btn-sm btn-danger" onclick="open_verify_pin_modal('delete_product__{{base64_encode($value->id)}}');"> --}}
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{-- {{ $entries->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Size:</label>
                                    <input type="number" class="form-control" id="recipient-name">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Nos:</label>
                                    <input type="number" class="form-control" id="recipient-name">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Square Feet:</label>
                                    <input type="number" class="form-control" id="recipient-name">
                                </div>
                            </div> 
                             <div class="col-sm-3 align-self-center">
                                    <button type="button" class="btn btn-primary mt-4">Save</button>
                            </div>
                        </div>
                        <hr>
                        <div class="row container">
                            <div class="table-responsive" style="height: 220px; " >
                                <table class="table table-hover">
                                    <thead>
                                        <tr class="text-primary">
                                            <th scope="col">Size</th>
                                            <th scope="col">Nos</th>
                                            <th scope="col">Square Feet</th>
                                            <th scope="col" class="text-center" >Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $items)
                                            <tr>
                                                <th scope="row">{{ $items->id }}</th>
                                                <td>{{ $items->customerName }}</td>
                                                <td>{{ $items->address }}</td>
                                                <td class="text-center">
                                                    <button title="Edit" data-toggle="modal" data-target="#exampleModal"
                                                        class="btn btn-social btn-just-icon btn-sm btn-success">
                                                        <i class="fa fa-pencil"></i>
                                                    </button>
                                                    <button title="Delete"
                                                        class="btn btn-social btn-just-icon btn-sm btn-danger">
                                                        {{-- <button title="Delete" class="btn btn-social btn-just-icon btn-sm btn-danger" onclick="open_verify_pin_modal('delete_product__{{base64_encode($value->id)}}');"> --}}
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">{{ $items->id }}</th>
                                                <td>{{ $items->customerName }}</td>
                                                <td>{{ $items->address }}</td>
                                                <td class="text-center">
                                                    <button title="Edit" data-toggle="modal" data-target="#exampleModal"
                                                        class="btn btn-social btn-just-icon btn-sm btn-success">
                                                        <i class="fa fa-pencil"></i>
                                                    </button>
                                                    <button title="Delete"
                                                        class="btn btn-social btn-just-icon btn-sm btn-danger">
                                                        {{-- <button title="Delete" class="btn btn-social btn-just-icon btn-sm btn-danger" onclick="open_verify_pin_modal('delete_product__{{base64_encode($value->id)}}');"> --}}
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">{{ $items->id }}</th>
                                                <td>{{ $items->customerName }}</td>
                                                <td>{{ $items->address }}</td>
                                                <td class="text-center">
                                                    <button title="Edit" data-toggle="modal" data-target="#exampleModal"
                                                        class="btn btn-social btn-just-icon btn-sm btn-success">
                                                        <i class="fa fa-pencil"></i>
                                                    </button>
                                                    <button title="Delete"
                                                        class="btn btn-social btn-just-icon btn-sm btn-danger">
                                                        {{-- <button title="Delete" class="btn btn-social btn-just-icon btn-sm btn-danger" onclick="open_verify_pin_modal('delete_product__{{base64_encode($value->id)}}');"> --}}
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">{{ $items->id }}</th>
                                                <td>{{ $items->customerName }}</td>
                                                <td>{{ $items->address }}</td>
                                                <td class="text-center">
                                                    <button title="Edit" data-toggle="modal" data-target="#exampleModal"
                                                        class="btn btn-social btn-just-icon btn-sm btn-success">
                                                        <i class="fa fa-pencil"></i>
                                                    </button>
                                                    <button title="Delete"
                                                        class="btn btn-social btn-just-icon btn-sm btn-danger">
                                                        {{-- <button title="Delete" class="btn btn-social btn-just-icon btn-sm btn-danger" onclick="open_verify_pin_modal('delete_product__{{base64_encode($value->id)}}');"> --}}
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">{{ $items->id }}</th>
                                                <td>{{ $items->customerName }}</td>
                                                <td>{{ $items->address }}</td>      
                                                <td class="text-center">
                                                    <button title="Edit" data-toggle="modal" data-target="#exampleModal"
                                                        class="btn btn-social btn-just-icon btn-sm btn-success">
                                                        <i class="fa fa-pencil"></i>
                                                    </button>
                                                    <button title="Delete"
                                                        class="btn btn-social btn-just-icon btn-sm btn-danger">
                                                        {{-- <button title="Delete" class="btn btn-social btn-just-icon btn-sm btn-danger" onclick="open_verify_pin_modal('delete_product__{{base64_encode($value->id)}}');"> --}}
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
<script type="text/javascript"></script>
