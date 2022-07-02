<?php

namespace App\Http\Controllers;

use App\city;
use Illuminate\Http\Request;

class cityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Cdata = city::all();
        return view('master.state.list',["data"=> $Cdata]);
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
            'stateName' => ['required'],
            'cityName' => ['required'],
            'cityCode' => ['required']
        ]);
        
        $cityData = new city;

        $cityData->stateName=$request->input('stateName');
        $cityData->cityName=$request->input('cityName');
        $cityData->cityCode=$request->input('cityCode');
        $cityData->save();


        $request->session()->flash('status', 'New city added: '.$cityData->cityName);
        return redirect()->route('master.state.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\city  $city
     * @return \Illuminate\Http\Response
     */
    public function show(city $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\city  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(city $city)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\city  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, city $city)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\city  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(city $city, $id)
    {
        $id = city::where('city_id',$id)->delete();

        return redirect()->route('master.state.list');

    }

    function getCity(Request $request){
        $state = $request->state;

        $cities = city::where('stateName',$state)->orderBy("cityName","ASC")->get();

        $html = "<option value=''>Select</option>";

        if(count($cities)){
            foreach ($cities as $key => $value) {
                $html .= '<option value="' . $value->cityName . '">' . $value->cityName . '</option>';
            }
        }
        echo $html;
    }
}

