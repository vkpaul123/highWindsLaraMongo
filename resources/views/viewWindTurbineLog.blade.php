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
                    
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h5><strong>Power (W)</strong></h5>
                        </div>

                        <div class="panel-body">
                            <div id="interactive-power" style="height: 200px;"></div>
                        </div>
                    </div>

                    <hr>
                    <h4 class="text-primary"><strong>Wind-Turbine Log</strong></h4>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sr No</th>
                                    <th>Voltage (V)</th>
                                    <th>Power (W)</th>
                                    <th>Humidity (%)</th>
                                    <th>Temperature (&deg C)</th>
                                    <th>Timestamp</th>
                                </tr>
                            </thead>

                            <tbody>
                                @isset ($windturbine['log'])
                                    @foreach($windturbine['log'] as $log)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $log['voltage'] }}</td>
                                            <td>{{ $log['power'] }}</td>
                                            <td>{{ $log['humidity'] }}</td>
                                            <td>{{ $log['temperature'] }}</td>
                                            <td>{{ $log['timestamp']->toDateTime()->format('r') }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6"> No Data</td>
                                    </tr>
                                @endisset
                            </tbody>
                        </table>
                    </div>
                    
                </div>

                <div class="panel-footer">
                    <i>Options</i>
                    <div class="pull-right">
                        <a href="{{ route('windturbine.show', $windturbine->id) }}" class="btn btn-lg btn-primary"><strong>Back</strong></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('pageSpecificLoadScripts')
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.min.js" integrity="sha256-LMe2LItsvOs1WDRhgNXulB8wFpq885Pib0bnrjETvfI=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.resize.min.js" integrity="sha256-EM0o7Qv7O213xqRbn8IFc6QsSr02kAX1/z7musSfxx8=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.categories.min.js" integrity="sha256-qHXQBTPet05CVuCP3sovsOfFrSqflitREG1/WFMpAvs=" crossorigin="anonymous"></script>

<script>
    $(function () {
        $(document).ready(function() {
          update();
        });

        function update() {
            
            $.ajax({
                url: '{{ route('windturbine.log.graphPlotter', $windturbine->id) }}',
                type: 'GET',
                dataType: 'json',
                data: {},
            })
            .done(function(data) {
                console.log("success");

                var interactive_plot_power = $.plot('#interactive-power', [data], {
                  grid  : {
                    borderColor: '#f3f3f3',
                    borderWidth: 1,
                    tickColor  : '#f3f3f3'
                  },
                  series: {
                    shadowSize: 0, // Drawing is faster without shadows
                    color     : '#00a65a'
                  },
                  lines : {
                    fill : true, //Converts the line chart to area chart
                    color: '#00a65a'
                  },
                  yaxis : {
                    min : 0,
                    max : 100,
                    show: true
                  },
                  xaxis : {
                    show: true
                  }
                });

                console.log(data);
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
            
            setTimeout(update, 5000);
        }
    })
</script>

@endsection
