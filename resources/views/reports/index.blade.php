@extends('layouts.app')

@section('content')
    <div class="modal" id="add" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Description</h5>
                    <button type="button" class="close" data-dismiss="modal" onclick="closeModal()" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.gifts.store')}}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body" style="padding-top:1rem;padding-bottom:0rem;">
                        <p id="modalText"></p>
                    </div>
                    <div class="modal-footer">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal" id="blockUserModal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Block User</h4>
                    <button type="button" class="close" data-dismiss="modal" onclick="closeBlockModal()"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.block.user') }}" method="POST" enctype="multipart/form-data"
                      id="blockForm">
                    @csrf
                    <div class="modal-body" style="padding-top:1rem;padding-bottom:0rem;">

                        <input type="hidden" value="" name="user_id" id="blockUser">
                        <input type="radio" value="0" id="isBlocked"> Block Permanently

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm float-right" disabled>BLOCK
                        </button>
                    </div>
                </form>
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
                                    <div class="col-8">
                                        <h3 class="mb-0">Reports</h3>
                                    </div>
                                    <div class="col-4 text-right">
                                        <a href="{{ url('/admin/reports?pending=0') }}"
                                           class="btn btn-danger btn-sm ml-auto">Pending</a>
                                        <a href="{{ url('/admin/reports?resolved=1') }}"
                                           class="btn btn-primary btn-sm ml-auto">Resolved</a>
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
                                    <th scope="col">ID</th>
                                    <th scope="col">REPORTED BY</th>
                                    <th scope="col">REPORTED FOR</th>
                                    <th scope="col">REPORT</th>
                                    <th scope="col">DATE</th>
                                    <th scope="col">READ</th>
                                    <th scope="col">Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($reports as $key=>$value)
                                    <tr>

                                        <td>{{$value->id}}</td>
                                        <td>{{ $value->fromUser }}</td>
                                        <td>{{ $value->forUser }}</td>
                                        <td>{{ $value->report }}</td>
                                        <td>{{ $value->date }}</td>
                                        <td onclick="readMe('{{$value->report}}')"><i class="ni ni-books"></i></td>
                                        <td onclick="blockUserModal({{$value->forUser}})">
                                            <button type="button" class="btn btn-danger btn-sm float-right">Block
                                            </button>
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
        function readMe(description) {
            $('#modalText').text(description);
            $('#add').toggle();
        }

        function closeModal() {
            $('#add').toggle();
        }

        function blockUserModal(id) {
            $('#blockUser').val(id);
            $('#blockUserModal').toggle();
        }

        $('#isBlocked').on('change', function () {
            if ($(this).is(":checked") == true) {
                $(this).val(1);
                $(':input[type="submit"]').prop('disabled', false);
            } else {
                $(this).val(0);
                $(':input[type="submit"]').prop('disabled', true);
            }
        })

        function closeBlockModal() {
            $('#blockUserModal').toggle();
        }
    </script>

@endpush
