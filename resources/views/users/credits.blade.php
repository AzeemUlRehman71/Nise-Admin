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
                                <h3 class="mb-0">Credits</h3>
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
                        <h3>Check-In Credits</h3>
                        <form method="post" action="{{ route('admin.credits.checkInCredits')}}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput1"> Check-In Start </label>
                                @php $whatIWant = substr($data ?? '', strpos($data ?? '', "_") + 1);  @endphp
                                <input type="text" name="checkinStart" class="form-control" id="exampleFormControlInput1" value="{{$checkin->checkInStart}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1"> Check-In End </label>
                                <input type="text" name="checkinEnd" class="form-control" id="exampleFormControlInput1" value="{{$checkin->checkInEnd}}">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4 px-5">{{ __('Save') }}</button>
                            </div>
                        </form>
                        <hr>

                        <h3>Video Ad Credits</h3>
                        <form method="post" action="{{ route('admin.credits.videoadCredits')}}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput1"> Video Ad Start </label>
                                <input type="text" name="videoadStart" class="form-control" id="exampleFormControlInput1" value="{{$videoad->videoAdStart}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1"> Video Ad End </label>
                                <input type="text" name="videoadEnd" class="form-control" id="exampleFormControlInput1" value="{{$videoad->videoAdEnd}}">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4 px-5">{{ __('Save') }}</button>
                            </div>
                        </form>
                        <hr>

                        <h3>Invite Friends Credits</h3>
                        <form method="post" action="{{ route('admin.credits.invitefriendsCredits')}}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput1"> Invite Friends Start </label>
                                <input type="text" name="invitefriendStart" class="form-control" id="exampleFormControlInput1" value="{{$friends->inviteFriendsStart}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1"> Invite Friends End </label>
                                <input type="text" name="invitefriendEnd" class="form-control" id="exampleFormControlInput1" value="{{$friends->inviteFriendsEnd}}">
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
