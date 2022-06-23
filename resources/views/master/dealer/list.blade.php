
 @extends('layouts.app', [
    'class' => '',
    'elementActive' => 'nozle',
    'title' => 'Dealer List'
])

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title align-self-center m-1">Dealer List</h4>
                        @if (Session::get('status'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('status') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close">Cancel</button>
                            </div>
                        @endif
                        <div>
                            <a href="{{ route('dealer.add') }}" class="btn btn-warning btn-round">Add New</a>
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
                                        <th scope="col">Contact No.</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Contact Person</th>
                                        <th scope="col">Email</th>
                                        <th scope="col" class="text-center">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($Ddata as $key => $items)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $items->dealerName }}</td>
                                            <td>{{ $items->contactNo }}</td>
                                            <td>{{ $items->address }}</td>
                                            <td>{{ $items->contactPerson }}</td>
                                            <td>{{ $items->dealerEmail }}</td>
                                            <td class="text-center">
                                                <button title="Edit" data-toggle="modal" data-target="#exampleModal"
                                                    class="btn btn-social btn-just-icon btn-sm btn-success m-1">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                                
                                                <a class="btn btn-social btn-just-icon btn-sm btn-danger" href="delete/{{ $items->dealer_id }}"><i class="fa fa-trash"></i></a>
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


@endsection

