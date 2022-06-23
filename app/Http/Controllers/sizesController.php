<?php

namespace App\Http\Controllers;

use App\size;
use Illuminate\Http\Request;

class sizesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        
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
    public function storee(Request $request)
    {
        // echo"<pre>";
        // print_r($request->post());
        // die();

        $size=$request->post('size');
        $nos=$request->post('nos');
        $squareFeet=$request->post('squareFeet');
        $customerId = $request->post('customerId');

        $sizeData = new size;

        $sizeData->size=$size;
        $sizeData->nos=$nos;
        $sizeData->squareFeet=$squareFeet;
        $sizeData->customerId = $customerId;
        if($sizeData->save()){
            $msg = "data inserted"; 
        }
        else{
            $msg = "error";
        }

        // DB::table('sizes')->insert(array($size=>'size', $nos=>'nos', $squareFeet=>'squareFeet')); 

        // $msg = "data inserted";

        return $msg;
        
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
            'size' => ['required'],
            'nos' => ['required'],
            'squareFeet' => ['required']
        ]);
        
        
        $sizeData = new size;

        $sizeData->size=$request->input('size');
        $sizeData->nos=$request->input('nos');
        $sizeData->squareFeet=$request->input('squareFeet');
        $sizeData->save();
        return redirect()->route('home.list');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\size  $size
     * @return \Illuminate\Http\Response
     */
    public function show(size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\size  $size
     * @return \Illuminate\Http\Response
     */
    public function edit(size $size)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, size $size)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy(size $size,$id)
    {
        $id = size::where('id',$id)->delete();

        return redirect()->route('home.list');

    }
}
    