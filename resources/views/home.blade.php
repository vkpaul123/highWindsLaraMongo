@extends('layouts.app')

@section('pageSpecificHeadContent')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/css/dataTables.bootstrap.min.css" integrity="sha256-PbaYLBab86/uCEz3diunGMEYvjah3uDFIiID+jAtIfw=" crossorigin="anonymous" />
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading"><h4><strong>My Wind-Turbines</strong><small style="color: #fff;"> &nbsp List of All Wind-turbines</small></h4></div>
                
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table id="windmillstable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Sr No</th>
                                    <th>Manufacturer</th>
                                    <th>Model No</th>
                                    <th>Rated Power (W)</th>
                                    <th>Options</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                    $i1 = 1;
                                @endphp

                                @foreach($windturbines as $windturbine)
                                    @if($windturbine->generalInfo['userID'] == Auth::user()->id)
                                    <tr>
                                        <td>
                                            {{ $i1 }}
                                            @php
                                                $i1++;
                                            @endphp
                                        </td>
                                        <td>{{ $windturbine->generalInfo['manufacturer'] }}</td>
                                        <td>{{ $windturbine->generalInfo['modelno'] }}</td>
                                        <td>{{ $windturbine->generalInfo['ratedpower'] }}</td>
                                        <td>
                                            <a href="{{ route('windturbine.show', $windturbine->id) }}" class="btn btn-xs btn-info">View</a>
                                             &nbsp | &nbsp
                                            <a href="{{ route('windturbine.edit', $windturbine->id) }}" class="btn btn-xs btn-warning">Edit</a>
                                             &nbsp | &nbsp
                                            <a href="" class="btn btn-xs btn-danger" onclick="if(confirm('Do you Want to delete this document?')) { event.preventDefault(); document.getElementById('deleteForm-{{ $windturbine->id }}').submit(); } else event.preventDefault();">Delete</a>

                                            <form action="{{ route('windturbine.destroy', $windturbine->id) }}" id="deleteForm-{{ $windturbine->id }}" style="display: none;" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                            </form>
                                        </td>
                                    </tr>
                                        
                                    @endif
                                
                                @endforeach

                                {{-- <tr>
                                    <td>1</td>
                                    <td>HiPowerpppppppppppppp</td>
                                    <td>Windy101</td>
                                    <td>25</td>
                                    <td>
                                        <a href="" class="btn btn-xs btn-info">View</a> &nbsp | &nbsp
                                        <a href="" class="btn btn-xs btn-warning">Edit</a> &nbsp | &nbsp
                                        <a href="" class="btn btn-xs btn-danger">Delete</a>
                                    </td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="panel-footer">
                    Total Wind-turbines: <strong class="text-primary">{{ $totWindTurbineCount }}</strong>
                    <a href="{{ route('windturbine.create') }}" class="btn btn-primary btn-lg pull-right"><strong>Add Wind-turbine</strong></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('pageSpecificLoadScripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/js/jquery.dataTables.min.js" integrity="sha256-qcV1wr+bn4NoBtxYqghmy1WIBvxeoe8vQlCowLG+cng=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/js/dataTables.bootstrap.min.js" integrity="sha256-X/58s5WblGMAw9SpDtqnV8dLRNCawsyGwNqnZD0Je/s=" crossorigin="anonymous"></script>

    <script>
      $(function () {
        $('#windmillstable').DataTable({
          'paging'      : true,
          'lengthChange': true,
          'searching'   : true,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : true,
          'order' : [3, 'asc'],
        })
      })
    </script>
@endsection