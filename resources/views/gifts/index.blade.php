@extends('layouts.app')

@section('content')
    <div class="modal" id="add" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Gift</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.gifts.store')}}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body" style="padding-top:1rem;padding-bottom:0rem;">

                        @csrf
                        <label>Title</label>
                        <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}"
                               name="title" required>
                        @if ($errors->has('title'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                             <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                        <label>Points</label>
                        <input type="text" class="form-control {{ $errors->has('coin') ? ' is-invalid' : '' }}"
                               name="coin" required>
                        @if ($errors->has('coin'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                             <strong>{{ $errors->first('coin') }}</strong>
                            </span>
                        @endif
                        <label>Image</label>
                        <input value="{{old('image')}}" type="file"
                               class="form-control @error('image') is-invalid @enderror"
                               accept="image/x-png,image/gif,image/jpeg"
                               onchange='ValidateSingleInput(this)' id="file"
                               name="image" style="padding: 9px; cursor: pointer">
                        @if ($errors->has('image'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>

                        @endif
                        <span class="invalid-feedback imageError" style="display:none;" role="alert">
                                <strong id="imageErrorText"></strong>
                        </span>
                        <label>SVGA Image</label>
                        <input value="{{old('svgaImage')}}" type="file"
                               class="form-control @error('svgaImage') is-invalid @enderror"
                               accept="image/svga"
                               onchange='ValidateSingleInputSVGA(this)' id="svgaImage"
                               name="svgaImage" style="padding: 9px; cursor: pointer">
                        @if ($errors->has('svgaImage'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('svgaImage') }}</strong>
                            </span>

                        @endif
                        <span class="invalid-feedback svgaImageError" style="display:none;" role="alert">
                                <strong id="svgaImageText"></strong>
                        </span>
                        <br>

                        <label>Global</label>
                        <input type="checkbox" style="margin-left: 10px;"
                               class="{{ $errors->has('global') ? ' is-invalid' : '' }}"
                               name="global" value="0" id="global">
                        @if ($errors->has('global'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                             <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif


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
                                    <h3 class="mb-0">Gifts</h3>
                                    <a href="#add" class="btn btn-primary btn-sm ml-auto" data-toggle="modal">Add
                                        Gifts</a>
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
                                    <th scope="col">Image</th>
                                    <th scope="col">SVGAImage</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Points</th>
                                    <th scope="col">Global</th>
                                    <th scope="col">Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($gifts as $key=>$value)
                                    <tr>

                                        <td>{{$key + 1}}</td>
                                        <td>
                                            <img style="width: 20%;"
                                                 src="{{ asset('uploads/gifts/'.$value->image.'') }}"
                                                 alt="{{$value->image}}"/>
                                        </td>
                                        <td>
                                            <a href="{{ asset('uploads/gifts/'.$value->svgaImage.'') }}">{{$value->svgaImage}}</a>
                                        </td>
                                        <td>{{$value->title}}</td>
                                        <td>{{$value->coins}}</td>
                                        <td>
                                            @if($value->global == 1)
                                                TRUE
                                            @else
                                                FALSE
                                            @endif
                                        </td>

                                        <td>
                                            <form action="{{ route('admin.gifts.delete', $value->id)}}"
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
        var _validFileExtensionsSVGA = [".svga"];

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

        function ValidateSingleInputSVGA(oInput) {

            if (oInput.type == "file") {
                var sFileName = oInput.value;
                if (sFileName.length > 0) {
                    var fsize = oInput.files[0].size;

                    debugger;
                    if (fsize > 1048576 * 6) //do something if file size more than 1 mb (1048576)
                    {
                        $('#svgaImageText').text('File too Big, please select a file less than 6mb')
                        $('.svgaImageError').show();
                        var $el = $('#svgaImage');
                        $el.wrap('<form>').closest('form').get(0).reset();
                        $el.unwrap();
                        $(':input[type="submit"]').prop('disabled', true);
                        return false;

                    }
                    var blnValid = false;
                    for (var j = 0; j < _validFileExtensionsSVGA.length; j++) {
                        var sCurExtension = _validFileExtensionsSVGA[j];
                        if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                            blnValid = true;
                            break;

                        }
                    }

                    if (!blnValid) {
                        $('#svgaImageText').text("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensionsSVGA.join(", "));
                        $(':input[type="submit"]').prop('disabled', true);
                        $('.svgaImageError').show();
                        oInput.value = "";
                        var $el = $('#svgaImage');
                        $el.wrap('<form>').closest('form').get(0).reset();
                        $el.unwrap();
                        return false;
                    }
                }
            }
            $(':input[type="submit"]').prop('disabled', false);
            return true;
        }

        $('#global').on('change', function () {
            if ($(this).is(":checked") == true) {
                $(this).val(1);
            } else {
                $(this).val(0);
            }
        })
    </script>

@endpush
