@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <!--Start update modal-->
    <div class="modal" id="updatecredit" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Select</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
             <div class="modal-body text-center">
                 <h2>Want To</h2>
                <a href="#add" class="btn btn-primary btn-lg" data-toggle="modal" data-dismiss="modal">Add Rates</a><span class="px-2">OR</span>
                <a href="#minus" class="btn btn-primary btn-lg" data-toggle="modal" data-dismiss="modal">Minus Rates</a>
            </div>
            <div class="modal-footer justify-content-center">
               <a href="{{ route('admin.call.reset.rate') }}" class="btn btn-danger btn-lg">Reset to Cost Value</a>
            </div>
        </div>
      </div>
    </div>
    <!--Start add modal-->
    <div class="modal" id="add" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Update Rates</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('admin.call.update.rate')}}" method="POST">
                @csrf
                <label>Add Credit</label>
                <input type="text" class="form-control {{ $errors->has('addcredit') ? ' is-invalid' : '' }}" name="addcredit">
                @if ($errors->has('addcredit'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('addcredit') }}</strong>
                    </span>
                @endif
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add</button>
                <a href="#updatecredit" class="btn btn-info" data-toggle="modal" data-dismiss="modal">Back</a>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--Start minus modal-->
    <div class="modal" id="minus" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Update Rates</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('admin.call.minus.rate')}}" method="POST">
                @csrf
                <label>Minus Credit</label>
                <input type="text" class="form-control {{ $errors->has('addcredit') ? ' is-invalid' : '' }}" name="minuscredit">
                @if ($errors->has('minuscredit'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('minuscredit') }}</strong>
                    </span>
                @endif
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Minus</button>
                <a href="#updatecredit" class="btn btn-info" data-toggle="modal" data-dismiss="modal">Back</a>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--End modal-->
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-12 form-inline">
                                <h3 class="mb-0">Call Rates</h3>
                                <a href="#updatecredit" class="btn btn-primary btn-sm ml-auto" data-toggle="modal">Update Rates</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12"></div>

                    <div class="table-responsive">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show mx-3" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <table class="table align-items-center table-flush" id="myTable">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Dial Code</th>
                                    <th scope="col">Cost-$</th>
                                    <th scope="col">Call Rate</th>
                                    <th scope="col">Flag</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($call_rate as $value)
                                    <tr>
                                    <td>{{$value->id}}</td>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->dialcode}}</td>
                                    <td>{{$value->cost}}</td>
                                    <td>{{$value->call_rate}}</td>
                                    <td><i class="flag-icon flag-icon-{{strtolower($value->iso)}}"></td>
                                    <td>
                  {{--                                        <form action="{{ route('admin.call.edit', $value->id)}}" method="get">--}}
                  {{--                                        @csrf--}}
                                                          <a type="submit" class="btn btn-primary btn-sm" href="{{ route('admin.call.edit', $value->id)}}">Edit</a>
                  {{--                                    </form>--}}
                                    </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                  <div class="card-footer py-4">
                      <nav class="d-flex justify-content-end" aria-label="...">
                      </nav>
                  </div>
              </div>
          </div>
      </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
