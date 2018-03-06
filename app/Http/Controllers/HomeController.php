<?php

namespace App\Http\Controllers;

use App\Windturbine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $windturbines = Windturbine::all();

        $totWindTurbineCount = 0;

        foreach ($windturbines as $windturbine) {
            if($windturbine->generalInfo['userID'] == Auth::user()->id)
                $totWindTurbineCount++;
        }

        return view('home')
        ->with(compact('windturbines'))
        ->with(compact('totWindTurbineCount'));
    }
}
