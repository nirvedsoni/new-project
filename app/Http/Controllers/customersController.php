<?php

namespace App\Http\Controllers;

use App\customer;
use App\size;
use App\state;
use App\city;



use Illuminate\Http\Request;

class customersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("master.customer.add");

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
            'customerName' => ['required'],
            'address' => ['required'],
            'landmark' => ['required'],
            'wallNo' => ['required'],
            'state' => ['required'],
            'City' => ['required'],
            'advDate' => ['required'],
            'wallRent' => ['required'],
        ]);
        
        
        $custData = new customer;

        $custData->customerName=$request->input('customerName');
        $custData->address=$request->input('address');
        $custData->landmark=$request->input('landmark');
        $custData->wallNo=$request->input('wallNo');
        $custData->state=$request->input('state');
        $custData->City=$request->input('City');
        $custData->advDate=$request->input('advDate');
        $custData->wallRent=$request->input('wallRent');
        $custData->save();

        $request->session()->flash('cstatus', 'New Customer added '.$custData->customerName);
        // return redirect("home/list");
        return redirect()->route('home.list');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $cities = [];

        $searchState = $request->searchState;
        $searchCity = $request->searchCity;
        $keyword = $request->keyword;
        // $data = customer::all();
        
        $data = customer::orderBy("wallNo","ASC");

        if($searchState){
            $data = $data->where("state",$searchState);

            $cities = city::where('stateName',$searchState)->orderBy("cityName","ASC")->get();
        }
        if($searchCity){
            $data = $data->where("city",$searchCity);
        }
        if($keyword){
            $data = $data->where(function($query) use ($keyword){
                        $query->where("customerName","like","%" . $keyword . "%")
                            ->orWhere("landmark","like","%" . $keyword . "%");
                    });
        }

        $data = $data->paginate(10);

        $states = state::orderBy("stateName","ASC")->get();

        //    $this->add($state,$cities,$searchState,$searchCity);

        return view('master.customer.list',compact("data","states","cities","searchState","searchCity","keyword"));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $custId = customer::where('cust_id',$request->custId)->delete();
        $custId = size::where('cust_id',$request->custId)->delete();

        echo true ;

        
    }

    public function add(){

        $sData = state::all();
        $cData = city::all();


        return view("master.customer.add",compact("sData","cData"));
    }


}   
