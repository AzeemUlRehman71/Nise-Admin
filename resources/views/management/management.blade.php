@extends('layouts.app')

@section('content')






<div class="modal" id="add" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add Management</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('admin.management.add')}}" method="POST">
                @csrf
                <label>Username</label>
                <input type="text" class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}" name="username">
                @if ($errors->has('username'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
                <label>Email</label>
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
                <label>Country</label>
     
                <input id="country_selector" class="form-control {{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" type="text">
                
                @if ($errors->has('country'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('country') }}</strong>
                    </span>
                @endif
                
     
                
                <div class="form-group">
                <label for="sel1">User Type</label>
                <select class="form-control" style="height:3rem" id="sel1" name="usertype">
                    <option value="admin">Admin</option>
                    <option value="country">Country Manger</option>
                    <option value="business">Business Manager</option>
                </select>
                </div>
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
                                <h3 class="mb-0">Management</h3>
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
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Member Since</th>
                                    <th scope="col">location</th>
                                    <th scope="col">Post</th>
                                    <th scope="col">OPtions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($admin as $value)
                                    <tr>
                                    <td>{{$value->id}}</td>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->email}}</td>
                                    <td>{{$value->created_at}}</td>
                                    <td>{{$value->location}}</td>
                                    <td>{{$value->post}}</td>

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