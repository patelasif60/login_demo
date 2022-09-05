@extends('layouts.app')
@section('page-scripts')
    <script src="{{ asset('js/employee/edit.js') }}"></script>
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
            <form class="edit-employee-form" action="{{ route('employee.update',$employee->id) }}" method="post" enctype="multipart/form-data">
		    			@csrf
                <div class="mb-3 col-lg-3">
                    <div class="form-group{{ $errors->has('first_name') ? ' is-invalid' : '' }}">
                        <label for="first_name" class="required">First Name:</label>
                        <input type="text" class="form-control" value="{{$employee->first_name}}" id="first_name" name="first_name">
                        @if ($errors->has('first_name'))
                            <div class="invalid-feedback animated fadeInDown">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="mb-3 col-lg-3">
                    <div class="form-group{{ $errors->has('company_id') ? ' is-invalid' : '' }}">
                        <label for="company_id" class="required">Last Name:</label>
                        <input type="text" class="form-control" value="{{$employee->last_name}}" id="last_name" name="last_name">
                        @if ($errors->has('last_name'))
                            <div class="invalid-feedback animated fadeInDown">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="mb-3 col-lg-3">
                    <div class="form-group{{ $errors->has('company_id') ? ' is-invalid' : '' }}">
                        <label for="company_id" class="required">company:</label>
                        <div>
                            <select class="js-select2 form-select" value="{{$employee->company_id}}" id="company_id" name="company_id">
                                <option value="">Please select</option>
                                @foreach($companies as $company)
                                    <option {{ $employee->company_id == $company->id ? 'selected': ' '}} value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if ($errors->has('company_id'))
                            <div class="invalid-feedback animated fadeInDown">
                                <strong>{{ $errors->first('company_id') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="mb-3 col-lg-3">
                    <div class="form-group{{ $errors->has('email') ? ' is-invalid' : '' }}">
                        <label for="email" class="required">Email:</label>
                        <input type="text" class="form-control" value="{{$employee->email}}" id="email" name="email">
                        @if ($errors->has('email'))
                            <div class="invalid-feedback animated fadeInDown">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="mb-3 col-lg-3">
                    <div class="form-group{{ $errors->has('phone') ? ' is-invalid' : '' }}">
                        <label for="phone" class="required">Phone:</label>
                        <input type="text" class="form-control" value="{{$employee->phone}}" id="phone" name="phone">
                        @if ($errors->has('phone'))
                            <div class="invalid-feedback animated fadeInDown">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="mb-3 col-lg-3">
                    <input class="btn btn-primary" type="submit" value="update" />
                </div>
            </form>
        </div>
    </div>
</div>
@endsection