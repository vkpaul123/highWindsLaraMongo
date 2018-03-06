@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form action="{{ route('windturbine.store') }}" class="form-horizontal" method="post" id="form1">
                <div class="panel panel-primary">
                    <div class="panel-heading"><h4><strong>Create Wind-Turbines</strong><small style="color: #fff;"> &nbsp create new Wind-turbine</small></h4></div>

                    <div class="panel-body">
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif

                        <h4 class="text-primary">General Info</h4>

                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('manufacturer') ? ' has-error' : '' }}">
                            <label for="manufacturer" class="col-md-3 control-label">Manufacturer</label>

                            <div class="col-md-7">
                                <input id="manufacturer" type="text" class="form-control" name="manufacturer" value="{{ old('manufacturer') }}" required autofocus>

                                @if ($errors->has('manufacturer'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('manufacturer') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('modelno') ? ' has-error' : '' }}">
                            <label for="modelno" class="col-md-3 control-label">Model No</label>

                            <div class="col-md-7">
                                <input id="modelno" type="text" class="form-control" name="modelno" value="{{ old('modelno') }}" required autofocus>

                                @if ($errors->has('modelno'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('modelno') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('ratedpower') ? ' has-error' : '' }}">
                            <label for="ratedpower" class="col-md-3 control-label">Rated Power</label>

                            <div class="col-md-7">
                                <input id="ratedpower" type="text" class="form-control" name="ratedpower" value="{{ old('ratedpower') }}" required autofocus>

                                @if ($errors->has('ratedpower'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('ratedpower') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <hr>
                        <h4 class="text-primary">Address</h4>

                        <div class="form-group{{ $errors->has('addresstext') ? ' has-error' : '' }}">
                            <label for="addresstext" class="col-md-3 control-label">Address</label>

                            <div class="col-md-7">
                                <textarea id="addresstext" class="form-control" name="addresstext" required autofocus rows="3">{{ old('addresstext') }}</textarea>

                                @if ($errors->has('addresstext'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('addresstext') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('streetname') ? ' has-error' : '' }}">
                            <label for="streetname" class="col-md-3 control-label">Street Name</label>

                            <div class="col-md-7">
                                <input id="streetname" type="text" class="form-control" name="streetname" value="{{ old('streetname') }}" required autofocus>

                                @if ($errors->has('streetname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('streetname') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('landmark') ? ' has-error' : '' }}">
                            <label for="landmark" class="col-md-3 control-label">Landmark</label>

                            <div class="col-md-7">
                                <input id="landmark" type="text" class="form-control" name="landmark" value="{{ old('landmark') }}" required autofocus>

                                @if ($errors->has('landmark'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('landmark') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('locality') ? ' has-error' : '' }}">
                            <label for="locality" class="col-md-3 control-label">Locality</label>

                            <div class="col-md-7">
                                <input id="locality" type="text" class="form-control" name="locality" value="{{ old('locality') }}" required autofocus>

                                @if ($errors->has('locality'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('locality') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('district') ? ' has-error' : '' }}">
                            <label for="district" class="col-md-3 control-label">District</label>

                            <div class="col-md-7">
                                <input id="district" type="text" class="form-control" name="district" value="{{ old('district') }}" required autofocus>

                                @if ($errors->has('district'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('district') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="city" class="col-md-3 control-label">City</label>

                            <div class="col-md-7">
                                <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}" required autofocus>

                                @if ($errors->has('city'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                            <label for="state" class="col-md-3 control-label">State</label>

                            <div class="col-md-7">
                                <input id="state" type="text" class="form-control" name="state" value="{{ old('state') }}" required autofocus>

                                @if ($errors->has('state'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('state') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('pincode') ? ' has-error' : '' }}">
                            <label for="pincode" class="col-md-3 control-label">Pincode</label>

                            <div class="col-md-7">
                                <input id="pincode" type="text" class="form-control" name="pincode" value="{{ old('pincode') }}" required autofocus>

                                @if ($errors->has('pincode'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('pincode') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="panel-footer">
                        <i>Please Enter Complete Details</i>
                        <div class="pull-right">
                            <a href="{{ route('home') }}" class="btn btn-lg btn-primary"><strong>Back</strong></a>
                            <input type="button" class="btn btn-success btn-lg" value="Submit" onclick="event.preventDefault(); document.getElementById('form1').submit();">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
