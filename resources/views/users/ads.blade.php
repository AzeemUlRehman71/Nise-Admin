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
                                <h3 class="mb-0">Ads</h3>
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
                        <h3>Admob Ad</h3>
                        <form method="post" action="{{ route('admin.ads.admob')}}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput1"> App Id </label>
                                <input type="text" name="admobAppId" class="form-control" id="exampleFormControlInput1" value="{{$ads->app_id}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1"> Banner Ad </label>
                                <input type="text" name="admobBannerAd" class="form-control" id="exampleFormControlInput1" value="{{$ads->banner_id}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1"> Interstitial Ad </label>
                                <input type="text" name="admobInterstitialAd" class="form-control" id="exampleFormControlInput1" value="{{$ads->inersitial_id}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1"> Rewarded Ad </label>
                                <input type="text" name="admonRewardedAd" class="form-control" id="exampleFormControlInput1" value="{{$ads->rewarded_id}}">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4 px-5">{{ __('Save') }}</button>
                            </div>
                        </form>
                        <hr>

                        <h3>Facebook Ad</h3>
                        <form method="post" action="{{ route('admin.ads.facebook')}}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput1"> Banner Ad </label>
                                <input type="text" name="fb_BannerAd" class="form-control" id="exampleFormControlInput1" value="{{$fbAds->fb_BannerAd}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1"> Interstitial Ad </label>
                                <input type="text" name="fb_InterstitialAd" class="form-control" id="exampleFormControlInput1" value="{{$fbAds->fb_InterstitialAd}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1"> Rewarded Ad </label>
                                <input type="text" name="fb_RewardedAd" class="form-control" id="exampleFormControlInput1" value="{{$fbAds->fb_RewardedAd}}">
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
