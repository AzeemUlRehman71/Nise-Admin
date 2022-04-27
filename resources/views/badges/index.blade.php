@extends('layouts.app')

@section('content')
    <div class="modal" id="add" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Badge</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.badges.store')}}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body" style="padding-top:1rem;padding-bottom:0rem;">

                        @csrf
                        <label>Title</label>
                        <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}"
                               name="title">
                        @if ($errors->has('title'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                             <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                        <label>Badge</label>
                        <input value="{{old('badge')}}" type="file"
                               class="form-control @error('badge') is-invalid @enderror"
                               accept="image/x-png,image/gif,image/jpeg"
                               onchange='ValidateSingleInput(this)' id="file"
                               name="badge" style="padding: 9px; cursor: pointer">
                        @if ($errors->has('badge'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('badge') }}</strong>
                            </span>

                        @endif
                        <span class="invalid-feedback imageError" style="display:none;" role="alert">
                                <strong id="imageErrorText"></strong>
                            </span>


                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="btnDisabled" disabled>Add</button>
                        <a href="#updatecredit" class="btn btn-info" data-toggle="modal" data-dismiss="modal">Back</a>

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
                                    <h3 class="mb-0">Badges</h3>
                                    <a href="#add" class="btn btn-primary btn-sm ml-auto" data-toggle="modal">Add
                                        Badge</a>
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
                                    <th scope="col" style="width: 2%;">ID</th>
                                    <th scope="col" style="width: 10%;">Image</th>
                                    <th scope="col" style="width: 50%;">Title</th>
                                    <th scope="col" style="text-align: right">Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($badges as $key=>$value)
                                    <tr>

                                        <td>{{$key + 1}}</td>
                                        <td>
                                            <image style="width: 100%;"
                                                   src="{{ asset('uploads/badges/'.$value->badge.'') }}"/>
                                        </td>
                                        <td>{{$value->title}}</td>

                                        <td>
                                            <form action="{{ route('admin.badges.delete', $value->id)}}"
                                                  method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm float-right">Delete
                                                </button>
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
        </div>
    </div>


@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>

    <script>

        var _validFileExtensions = [".jpg", ".jpeg", ".png"];

        function ValidateSingleInput(oInput) {

            if (oInput.type == "file") {
                var sFileName = oInput.value;
                if (sFileName.length > 0) {
                    var fsize = oInput.files[0].size;

                    debugger;
                    if (fsize > 1048576) //do something if file size more than 1 mb (1048576)
                    {
                        $('#imageErrorText').text('File too Big, please select a file less than 1mb')
                        $('.imageError').show();
                        var $el = $('#file');
                        $el.wrap('<form>').closest('form').get(0).reset();
                        $el.unwrap();
                        $(':input[type="submit"]').prop('disabled', true);
                        return false;

                    }
                    var blnValid = false;
                    for (var j = 0; j < _validFileExtensions.length; j++) {
                        var sCurExtension = _validFileExtensions[j];
                        if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                            blnValid = true;
                            break;

                        }
                    }

                    if (!blnValid) {
                        $('#imageErrorText').text("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                        $(':input[type="submit"]').prop('disabled', true);
                        $('.imageError').show();
                        oInput.value = "";
                        var $el = $('#file');
                        $el.wrap('<form>').closest('form').get(0).reset();
                        $el.unwrap();
                        return false;
                    }
                }
            }
            $(':input[type="submit"]').prop('disabled', false);
            return true;
        }
    </script>

@endpush
