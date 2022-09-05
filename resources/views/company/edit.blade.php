@extends('layouts.app')
@section('page-scripts')
    <script src="{{ asset('js/company/edit.js') }}"></script>
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
            <form class="create-comapny-form" action="{{ route('company.update',$company->id) }}" method="post" enctype="multipart/form-data">
		    			@csrf
                <div class="mb-3 col-lg-3">
                    <div class="form-group{{ $errors->has('name') ? ' is-invalid' : '' }}">
                        <label for="name" class="required">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$company->name}}">
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
                        <textarea class="form-control" name="address" id="address">{{$company->address}}</textarea>
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
                        <input type="text" class="form-control" id="email" name="email" value="{{$company->email}}" >
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
                        <input type="text" class="form-control" id="website" name="website" value="{{$company->website}}">
                        @if ($errors->has('website'))
                            <div class="invalid-feedback animated fadeInDown">
                                <strong>{{ $errors->first('website') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <input type="hidden" name="logo_edit" value="{{$company->logo}}" />
                <div class="mb-3 col-lg-6">
                    <div class="row">
                        <div class="col-6">
                        <label class="form-label" for="logo">logo</label>
                        <input class="form-control" name="logo" id="logo" type="file" /></div>
                        <div class="col-6">
                            <img src="{{$company->logo}}" class="logo_preview_container" width="100" height="100"/>
                        </div>
                    </div>
                </div>
                <div class="mb-3 col-lg-3">
                    <input class="btn btn-primary" type="submit" value="Update" />
                </div>
            </form>
        </div>
    </div>
</div>
@endsection