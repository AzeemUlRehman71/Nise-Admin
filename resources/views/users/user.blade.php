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
                                <h3 class="mb-0">Users</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-12"></div>
    
                    <div class="table-responsive">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">SR #</th>
                                    <th scope="col">Dial Code</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Referal Code</th>
                                    <th scope="col">Account ID</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $key => $value)
                                    <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$value->dial_code}}</td>
                                    <td>{{$value->phone}}</td>
                                    <td>{{$value->referral_code}}</td>
                                    <td>{{$value->id}}</td>
                                    <td>
                                        <form action="{{ route('admin.users.delete', $value->id)}}" method="post">
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
@endpush