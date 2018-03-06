<?php

namespace App\Http\Controllers;

use App\Windturbine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WindturbineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createWindTurbine');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->validate($request, [
            'manufacturer' => 'required',
            'modelno' => 'required',
            'ratedpower' => 'required',

            'addresstext' => 'required',
            'streetname' => 'required',
            'landmark' => 'required',
            'locality' => 'required',
            'district' => 'required',
            'city' => 'required',
            'state' => 'required',
            'pincode' => 'required',
        ]);

        Windturbine::create([
            'generalInfo' => [
                'userID' => Auth::user()->id,
                'manufacturer' => $request->manufacturer,
                'modelno' => $request->modelno,
                'ratedpower' => $request->ratedpower,
            ],
            'addressInfo' => [
                'addresstext' => $request->addresstext,
                'streetname' => $request->streetname,
                'landmark' => $request->landmark,
                'locality' => $request->locality,
                'district' => $request->district,
                'city' => $request->city,
                'state' => $request->state,
                'pincode' => $request->pincode,
            ],
        ]);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $windturbine = Windturbine::find($id);

        return view('viewWindTurbine')
        ->with(compact('windturbine'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $windturbine = Windturbine::find($id);

        return view('editWindTurbine')
        ->with(compact('windturbine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $this->validate($request, [
            'manufacturer' => 'required',
            'modelno' => 'required',
            'ratedpower' => 'required',

            'addresstext' => 'required',
            'streetname' => 'required',
            'landmark' => 'required',
            'locality' => 'required',
            'district' => 'required',
            'city' => 'required',
            'state' => 'required',
            'pincode' => 'required',
        ]);

        $windturbine = Windturbine::find($id);

        $windturbine->generalInfo = [
            'userID' => Auth::user()->id,
            'manufacturer' => $request->manufacturer,
            'modelno' => $request->modelno,
            'ratedpower' => $request->ratedpower,
        ];

        $windturbine->addressInfo = [
            'addresstext' => $request->addresstext,
            'streetname' => $request->streetname,
            'landmark' => $request->landmark,
            'locality' => $request->locality,
            'district' => $request->district,
            'city' => $request->city,
            'state' => $request->state,
            'pincode' => $request->pincode,
        ];

        $windturbine->save();

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $windturbine = Windturbine::find($id);
        $windturbine->delete();

        return redirect()->route('home');
    }
}
