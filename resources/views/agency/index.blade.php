@extends('layouts.app')

@section('content')
<div class="modal" id="add" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add Agency</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="padding-top:1rem;padding-bottom:0rem;">
            <form action="{{ route('admin.agency.add')}}" method="POST">
                @csrf
                <label>Agency Name</label>
                <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name">
                @if ($errors->has('name'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
                <label>Agency Email</label>
                <input type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email">
                @if ($errors->has('email'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                <label>Password</label>
                <input type="text" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
                @if ($errors->has('password'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                <label>Phone No</label>
                <input type="text" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone">
                @if ($errors->has('phone'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
                <label>Agency Code</label>
                <input type="text" class="form-control {{ $errors->has('agency_code') ? ' is-invalid' : '' }}" name="agency_code">
                @if ($errors->has('agency_code'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('agency_code') }}</strong>
                    </span>
                @endif
                <label>Nise Id</label>
                <input type="text" class="form-control {{ $errors->has('nise_id') ? ' is-invalid' : '' }}" name="nise_id">
                @if ($errors->has('nise_id'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('nise_id') }}</strong>
                    </span>
                @endif
                
                <label>Country</label>
     
                <input id="country_selector" class="form-control {{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" type="text">
                
                @if ($errors->has('country'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('country') }}</strong>
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




    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-6">
    </div>

    <div class="container-fluid">

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-12 form-inline">
                                <h3 class="mb-0">Agency</h3>
                                <a href="#add" class="btn btn-primary btn-sm ml-auto" data-toggle="modal">Add Management</a>
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
                                    <th scope="col">Agency Name</th>
                                    <th scope="col">Agency Code</th>
                                    <th scope="col">Manager Contact</th>
                                    <th scope="col">Nies Id</th>
                                    <th scope="col">Target</th>
                                    <th scope="col">location</th>
                                    <th scope="col">Agency Created</th>
                                    <th scope="col">Total Host</th>
                                    <th scope="col">Total Recieving</th>
                                    <th scope="col">Last Month Recieving</th>
                                    <th scope="col">Last Host Joined</th>
                                    <th scope="col">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($agency as $value)
                                    <tr>
                                    
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->code}}</td>
                                    <td>{{$value->phone}}</td>
                                    <td>{{$value->nise_id}}</td>
                                    <td>{{$value->target}}</td>
                                    
                                    @if(!is_null($value->user))
                                        <td>{{$value->user->location}}</td>
                                    @else
                                        <td></td>
                                    @endif
                                    @if(!is_null($value->user))
                                        <td>{{$value->user->created_at}}</td>
                                    @else
                                        <td></td>
                                    @endif  
                                    <td>
                                        @php
                                            print_r(count_agencyuser($value->nise_id));
                                        @endphp
                                    </td>
                                    <td>0</td>
                                    <td>0</td>
                                    @if(!is_null(get_last_host($value->nise_id)))
                                    <td>
                                        @php

                                        print_r(date('Y-m-d H:i:s',strtotime(get_last_host($value->nise_id))));
            
                                        @endphp
                                    </td>
                                    @else
                                        <td></td>
                                    @endif      

                                    <td>
                                        <form action="{{ route('admin.management.delete', $value->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" >Delete</button>
                                    </form>
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
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    
    <script src="{{ asset('dist/js/countrySelect.min.js') }}"></script>

    <script>
			$("#country_selector").countrySelect({
				// defaultCountry: "jp",
				// onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
				// responsiveDropdown: true,
				preferredCountries: ['ca', 'gb', 'us']
			});
	

    </script>
    
@endpush