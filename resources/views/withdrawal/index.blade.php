@extends('layouts.app')

@section('content')


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
                                    <div class="col-6">
                                        <h3 class="mb-0">Withdrawal</h3>
                                    </div>
                                    <div class="col-6 text-right">
                                        <a href="{{ url('/admin/withdrawal?pending=0') }}"
                                           class="btn btn-primary btn-sm ml-auto">Pending</a>
                                        <a href="{{ url('/admin/withdrawal?accepted=1') }}"
                                           class="btn btn-success btn-sm ml-auto">Accepted</a>
                                        <a href="{{ url('/admin/withdrawal?rejected=1') }}"
                                           class="btn btn-danger btn-sm ml-auto">Rejected</a>
                                    </div>


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
                                    <th scope="col">USER ID</th>
                                    <th scope="col">POINTS</th>
                                    <th scope="col">TITLE</th>
                                    <th scope="col">BANK</th>
                                    <th scope="col">IBAN</th>
                                    <th scope="col">DATE</th>
                                    <th scope="col">Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($withdrawals as $key=>$value)
                                    <tr>

                                        <td>{{$value->uid}}</td>
                                        <td>{{ $value->points }}</td>
                                        <td>{{ $value->title }}</td>
                                        <td>{{ $value->bank }}</td>
                                        <td>{{ $value->iban }}</td>
                                        <td>{{ $value->date }}</td>
                                        <td style="display: inline-flex">
                                            <a href="{{ route('admin.withdrawal.accept',$value->id) }}"
                                               class="btn btn-success btn-sm float-right">Accept</a>
                                            <a href="{{ route('admin.withdrawal.reject',$value->id) }}"
                                               class="btn btn-danger btn-sm float-right">Reject</a>
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
        </div>
    </div>


@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>

    <script>

        function blockUserModal(id) {
            $('#blockUser').val(id);
            $('#blockUserModal').toggle();
        }


    </script>

@endpush
