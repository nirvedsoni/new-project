<?php

namespace App\Http\Controllers;

use App\state;
use App\city;
use Illuminate\Http\Request;

class stateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Sdata = state::all();
        $Cdata = city::all();

        return view('master.state.list',["sData"=> $Sdata, "cData"=> $Cdata ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'stateName' => 'required|unique:states,stateName'
        ]);
        
        $stateData = new state;

        $stateData->stateName=$request->input('stateName');
        $stateData->save();


        // $request->session()->flash('status', 'New State added: '.$stateData->stateName);
        return redirect()->route('master.state.list');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\state  $state
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       //    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\state  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(state $state)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\state  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, state $state)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\state  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(state $state, $id)
    {
        $id = state::where('state_id',$id)->delete();

        return redirect()->route('master.state.list');

    }
}
