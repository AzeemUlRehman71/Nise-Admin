@extends('layouts.app', ['title' => __('User Profile')])

@section('content')

    @include('users.partials.header', [
        'title' => 'Call Rate',
    ])


    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                {{-- <img src="{{ asset('argon')}}/img/theme/team-4-800x800.jpg" class="rounded-circle"> --}}
                                <img src="{{ asset('flags/flags/1x1/'.strtolower($edit->iso).'.svg')}}" width="125px" height="125px" class="rounded-circle">
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">

                    </div>
                    <div class="card-body pt-0 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-2">
                                    <h2><b>{{$edit->name}}</b></h2>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <h3><b>Code: +{{$edit->dialcode}}</b></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">{{ __('Edit Call Rate') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.call.update', $edit->id)}}" method="post">
                            @csrf
                            <h6 class="heading-small text-muted mb-4">{{ __('Country information') }}</h6>

                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Country Name') }}</label>
                                    <input type="text" disabled name="country_name" id="input-email" class="form-control form-control-alternative" value="{{$edit->name}}">
                                </div>
                                <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-current-password">{{ __('Cost($)') }}</label>
                                    <input type="text" disabled name="cost" id="input-current-password" class="form-control form-control-alternative"  value="{{$edit->cost}}">
                                </div>
                                <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-current-password">{{ __('Call Rate') }}</label>
                                    <input type="text"  name="call_rate" id="input-current-password" class="form-control form-control-alternative"  value="{{$edit->call_rate}}">
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <i class="flag-icon-{{strtolower($edit->iso)}}"></i>

        {{-- @include('layouts.footers.auth') --}}
    </div>
@endsection
