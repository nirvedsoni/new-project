<?php

namespace App\Http\Controllers;

use App\dealer;
use Illuminate\Http\Request;

class dealerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    function add(){

        return view('master.dealer.add');
    }

    function list(){
        $Ddata = dealer::all();

        return view('master.dealer.list',["Ddata"=> $Ddata]);
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
            'dealerName' => ['required'],
            'contactNo' => ['required'],
            'address' => ['required'],
            'contactPerson' => ['required'],
            'dealerEmail' => ['required','email'],
        ]);
        
        $dealerData = new dealer;

        $dealerData->dealerName=$request->input('dealerName');
        $dealerData->contactNo=$request->input('contactNo');
        $dealerData->address=$request->input('address');
        $dealerData->contactPerson=$request->input('contactPerson');
        $dealerData->dealerEmail=$request->input('dealerEmail');
        $dealerData->save();


        $request->session()->flash('status', 'New Dealer added: '.$dealerData->dealerName);
        // return redirect()->route('dealer.list');
        return back()->with('success', 'Your form has been submitted.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\dealer  $dealer
     * @return \Illuminate\Http\Response
     */
    public function show(dealer $dealer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\dealer  $dealer
     * @return \Illuminate\Http\Response
     */
    public function edit(dealer $dealer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\dealer  $dealer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dealer $dealer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\dealer  $dealer
     * @return \Illuminate\Http\Response
     */
    public function destroy(dealer $dealer, $id)
    {
        $id = dealer::where('dealer_id',$id)->delete();

        return redirect()->route('dealer.list');

    }


}
