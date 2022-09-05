@extends('layouts.app')
@section('page-scripts')
    <script src="{{ asset('js/company/create.js') }}"></script>
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="border-0 rounded-lg">
             @if (count($errors) > 0)
              <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif
            <form class="create-comapny-form" action="{{ route('company.store') }}" method="post" enctype="multipart/form-data">
		    			@csrf
                <div class="mb-3 col-lg-3">
                    <div class="form-group{{ $errors->has('name') ? ' is-invalid' : '' }}">
                        <label for="name" class="required">Name:</label>
                        <input type="text" class="form-control" id="name" name="name">
                        @if ($errors->has('name'))
                            <div class="invalid-feedback animated fadeInDown">
                                <strong>{{ $errors->first('name') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="mb-3 col-lg-3">
                    <div class="form-group{{ $errors->has('address') ? ' is-invalid' : '' }}">
                        <label for="address" class="required">Address:</label>
                        <textarea class="form-control" name="address" id="address"></textarea>
                        @if ($errors->has('address'))
                            <div class="invalid-feedback animated fadeInDown">
                                <strong>{{ $errors->first('address') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="mb-3 col-lg-3">
                    <div class="form-group{{ $errors->has('email') ? ' is-invalid' : '' }}">
                        <label for="email" class="required">Email:</label>
                        <input type="text" class="form-control" id="email" name="email">
                        @if ($errors->has('email'))
                            <div class="invalid-feedback animated fadeInDown">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="mb-3 col-lg-3">
                    <div class="form-group{{ $errors->has('website') ? ' is-invalid' : '' }}">
                        <label for="website" class="required">Website:</label>
                        <input type="text" class="form-control" id="website" name="website">
                        @if ($errors->has('website'))
                            <div class="invalid-feedback animated fadeInDown">
                                <strong>{{ $errors->first('website') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="mb-3 col-lg-6">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group{{ $errors->has('logo') ? ' is-invalid' : '' }}">
                                <label for="logo" class="required">logo:</label>
                                <input class="form-control" id="logo" name="logo"  type="file">
                                @if ($errors->has('logo'))
                                    <div class="invalid-feedback animated fadeInDown">
                                        <strong>{{ $errors->first('logo') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-6 d-none js-thumbnail">
                            <img src="" class="logo_preview_container" width="100" height="100"/>
                        </div>
                    </div>
                </div>
                <div class="mb-3 col-lg-3">
                    <input class="btn btn-primary" type="submit" value="Create" />
                </div>
            </form>
        </div>
    </div>
</div>
@endsection