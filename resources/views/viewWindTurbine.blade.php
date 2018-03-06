@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading"><h4><strong>Wind-Turbine ID</strong><small style="color: #fff;"> &nbsp {{ $windturbine->id }}</small></h4></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4 class="text-primary"><strong>General Info</strong></h4>

                    <div class="row">
                        <div class="col-md-3 col-md-offset-1"><strong class="text-primary">Manufacturer</strong></div>
                        <div class="col-md-8">{{ $windturbine->generalInfo['manufacturer'] }}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 col-md-offset-1"><strong class="text-primary">Model No</strong></div>
                        <div class="col-md-8">{{ $windturbine->generalInfo['modelno'] }}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 col-md-offset-1"><strong class="text-primary">Rated Power</strong></div>
                        <div class="col-md-8">{{ $windturbine->generalInfo['ratedpower'] }} W</div>
                    </div>

                    <hr>
                    <h4 class="text-primary"><strong>Address Info</strong></h4>
                    
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1"><strong class="text-primary">Address</strong></div>
                        <div class="col-md-8">{{ $windturbine->addressInfo['addresstext'] }}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 col-md-offset-1"><strong class="text-primary">Street Name</strong></div>
                        <div class="col-md-8">{{ $windturbine->addressInfo['streetname'] }}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 col-md-offset-1"><strong class="text-primary">Landmark</strong></div>
                        <div class="col-md-8">{{ $windturbine->addressInfo['landmark'] }}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 col-md-offset-1"><strong class="text-primary">Locality</strong></div>
                        <div class="col-md-8">{{ $windturbine->addressInfo['locality'] }}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 col-md-offset-1"><strong class="text-primary">District</strong></div>
                        <div class="col-md-8">{{ $windturbine->addressInfo['district'] }}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 col-md-offset-1"><strong class="text-primary">City</strong></div>
                        <div class="col-md-8">{{ $windturbine->addressInfo['city'] }}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 col-md-offset-1"><strong class="text-primary">State</strong></div>
                        <div class="col-md-8">{{ $windturbine->addressInfo['state'] }}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 col-md-offset-1"><strong class="text-primary">Pincode</strong></div>
                        <div class="col-md-8">{{ $windturbine->addressInfo['pincode'] }}</div>
                    </div>
                    
                </div>

                <div class="panel-footer">
                    <i>Options</i>
                    <div class="pull-right">
                        <a href="{{ route('windturbine.log', $windturbine->id) }}" class="btn btn-lg btn-info"><strong>View Log</strong></a>
                        <a href="{{ route('home') }}" class="btn btn-lg btn-primary"><strong>Back</strong></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
