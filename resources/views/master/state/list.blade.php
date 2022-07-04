@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'statelist',
    'title' => 'State List',
])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card pb-1">
                        <div class="card-header d-flex justify-content-between">
                            {{-- <h4 class="card-title align-self-center m-1">State List</h4> --}}
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-sm-6">
                                        <form action="store" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-sm-3 align-self-center">
                                                    <label for="inputState">State Name</label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" name="stateName"
                                                        class="@error('stateName') is-invalid @enderror form-control"
                                                        placeholder="Enter State Name">
                                                    @error('stateName')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-2">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                        <hr>
                                        <div class="row">
                                            <div class="container">
                                                <div class="table-responsive" style="height: 450px">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr class="text-primary">
                                                                <th scope="col">S.No.</th>
                                                                <th scope="col">State Name</th>
                                                                <th class="text-center" scope="col">Delete</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($sData as $key => $items)
                                                                <tr>
                                                                    <th scope="row">{{ $key + 1 }}</th>
                                                                    <td>{{ $items->stateName }}</td>
                                                                    <td class="text-center">
                                                                        <a href="statedelete/{{ $items->state_id }}"
                                                                            class="btn btn-social btn-just-icon btn-sm btn-danger">
                                                                            <i class="fa fa-trash"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 text-center">
                                        <form action="storeCity" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-sm-3 align-self-center float-start">
                                                                <label for="">State Name</label>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <select name="stateName2"
                                                                        class="@error('stateName2') is-invalid @enderror form-control">
                                                                        <option value="" selected>select your options</option>
                                                                        @foreach ($sData as $items)
                                                                            <option value="{{ $items->stateName }}">
                                                                                {{ $items->stateName }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('stateName2')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
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
                                                                    <input type="text" name="cityName"
                                                                        class="@error('cityName') is-invalid @enderror form-control"
                                                                        placeholder="Enter City Name">
                                                                    @error('cityName')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
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
                                                                <input type="number" name="cityCode"
                                                                    class="@error('cityCode') is-invalid @enderror form-control"
                                                                    placeholder="Enter City Code">
                                                                @error('cityCode')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>

                                        </form>

                                        <hr>
                                        <div class="row">
                                            <div class="container">
                                                <div class="table-responsive" style="height: 280px">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr class="text-primary">
                                                                <th scope="col">S.No.</th>
                                                                <th scope="col">State Name</th>
                                                                <th scope="col">City Name</th>
                                                                <th scope="col">City Code</th>
                                                                <th class="text-center" scope="col">Delete</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($cData as $key => $items)
                                                                <tr>
                                                                    <th scope="row">{{ $key + 1 }}</th>
                                                                    <td>{{ $items->stateName }}</td>
                                                                    <td>{{ $items->cityName }}</td>
                                                                    <td>{{ $items->cityCode }}</td>
                                                                    <td class="text-center">
                                                                        <a href="citydelete/{{ $items->city_id }}"
                                                                            class="btn btn-social btn-just-icon btn-sm btn-danger"><i
                                                                                class="fa fa-trash"></i></a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
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
