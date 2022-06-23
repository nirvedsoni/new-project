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
    public function show()
    {
        $data = customer::all();
        // return view('master.customer.list',["data"=> $data]);

        $sizeData = size::all();
        return view('master.customer.list',["sizeData"=> $sizeData, "data"=>$data]);

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
    public function destroy(customer $customer)
    {
        //
    }

    function add(){

        $Sdata = state::all();
        $Cdata = city::all();

        return view("master.customer.add",["sData"=> $Sdata, "cData"=> $Cdata]);
    }
}   
