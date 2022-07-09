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
                                                        placeholder="Enter State Name" required >
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
                                                                        <button onclick="stateDelete('{{ $items->state_id }}');"
                                                                            class="btn btn-social btn-just-icon btn-sm btn-danger">
                                                                            <i class="fa fa-trash"></i>
                                                                        </button>
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
                                                                        class="form-control" required>
                                                                        <option value="" selected>select your options
                                                                        </option>
                                                                        @foreach ($sData as $items)
                                                                            <option value="{{ $items->stateName }}">
                                                                                {{ $items->stateName }}</option>
                                                                        @endforeach
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
                                                                    <input type="text" name="cityName"
                                                                        class="form-control"
                                                                        placeholder="Enter City Name" required>
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
                                                                    class="form-control"
                                                                    placeholder="Enter City Code" required>
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
                                                                        <button onclick="cityaDelete('{{ $items->city_id }}');"
                                                                            class="btn btn-social btn-just-icon btn-sm btn-danger">
                                                                            <i class="fa fa-trash"></i>
                                                                        </button>
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

<script>


 function stateDelete($stateId) {
    $.confirm({
        title: 'Alert!',
        content: 'Are you sure to delete this state?',
        buttons: {
            confirm: {
                text: 'Confirm',
                btnClass: 'btn-red',
                action: function() {
                    location.href ="statedelete/"+$stateId;
                }
            },
            cancel: function() {

            }
        }
    });
 }



 function cityaDelete($cityId) {
    $.confirm({
        title: 'Alert!',
        content: 'Are you sure to delete this city?',
        buttons: {
            confirm: {
                text: 'Confirm',
                btnClass: 'btn-red',
                action: function() {
                    location.href ="citydelete/"+$cityId;
                }
            },
            cancel: function() {

            }
        }
    });
 }


   
</script>
