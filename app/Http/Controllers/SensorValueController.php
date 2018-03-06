<?php

namespace App\Http\Controllers;

use App\Windturbine;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SensorValueController extends Controller
{
    public function log($id)
    {
    	$windturbine = Windturbine::find($id);

    	return view('viewWindTurbineLog')
    	->with(compact('windturbine'));
    }

    public function store($id, $voltage, $temperature, $humidity)
    {
    	$windturbine = Windturbine::find($id);

    	$windturbine->push('log', [
    		'voltage' => $voltage,
    		'power' => ($voltage * $voltage),
    		'humidity' => $humidity,
    		'temperature' => $temperature,
    		'timestamp' => new \MongoDB\BSON\UTCDateTime(new \DateTime('now')),
    	]);

    	$windturbine->save();

    	return "Sensor Value Stored.";
    }

    public function graphPlotter($id)
    {
    	$windturbine = Windturbine::find($id);

    	if($windturbine->log != null) {
	    	$allLogs = array_slice($windturbine->log, -100);

	    	$powers = [];
	    	$i = 0;

	    	foreach ($allLogs as $log) {
	    		array_push($powers, [$i, $log['power']]);
	    		$i++;
	    	}

	    	return response()->json($powers);
    	}

	    return response()->json([]);
    }
}
