@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Google Billing</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-12"></div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
{{--                        <h3>Admob Ad</h3>--}}
                        <form method="post" action="{{ route('admin.googleBilling.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput1"> LICENSE KEY </label>
                                <input type="text" name="license_key" class="form-control" id="exampleFormControlInput1" value="{{$googleBilling->license_key}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1"> MERCHANT ID </label>
                                <input type="text" name="merchant_id" class="form-control" id="exampleFormControlInput1" value="{{$googleBilling->merchant_id}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1"> PRODUCT ID </label>
                                <input type="text" name="product_id" class="form-control" id="exampleFormControlInput1" value="{{$googleBilling->product_id}}">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4 px-5">{{ __('Save') }}</button>
                            </div>
                        </form>
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
