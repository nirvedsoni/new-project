<?php

namespace App\Http\Controllers;

use App\customer;
use App\size;
use App\state;
use App\city;
use Illuminate\Support\Facades\DB;



use Illuminate\Http\Request;

class customersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sData = state::orderBy('stateName','ASC')->get();
        // $cData = city::orderBy('city_id','DESC')->get();

        $lastId = customer::get()->last()->cust_id;

        $currentId = 0;
        $allData = null ;
        $cData = [] ;

        if($request->lastId){
            $lastId = $request->lastId;
        }
        
        if($request->currentId){
            $currentId = $request->currentId;

            $allData = customer::where("cust_id",$currentId)->first();

            $cData = city::where("cityName",$allData->city)->orderBy('city_id','DESC')->get();
            
        }
        // if($request->customerName){
        //     $customerName = $request->customerName;
        // }
        // if($request->landmark){
        //     $landmark = $request->landmark;
        // }
        // if($request->wallNo){
        //     $wallNo = $request->wallNo;
        // }
        // if($request->state){
        //     $state = $request->state;
        // }
        // if($request->City){
        //     $City = $request->City;
        // }
        // if($request->advDate){
        //     $advDate = $request->advDate;
        // }
        // if($request->wallRent){
        //     $wallRent = $request->wallRent;
        // }
        
        // return view("master.customer.add",compact("sData","cData","lastId","currentId","customerName","landmark","wallNo","state","City","advDate","wallRent"));

        return view("master.customer.add",compact("sData","cData","lastId","currentId","allData"));

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

        
        $custData = new customer;

        $custData->customerName=$request->input('customerName');
        $custData->address=$request->input('address');
        $custData->landmark=$request->input('landmark');
        $custData->wallNo=$request->input('wallNo');
        $custData->state=$request->input('state');
        $custData->City=$request->input('City');
        $custData->advDate=$request->input('advDate');
        $custData->wallRent=$request->input('wallRent');
        // $custData->save();
        // $lastId = $custData::all()->last()->cust_id;
        // $lastId = $custData::get()->last()->cust_id;
        
        $lastId = customer::get()->last()->cust_id;

        $sData = state::orderBy('stateName','ASC')->get();
        $cData = city::orderBy('city_id','DESC')->get();

        // $all = customer::get()->last()->cust_id;

        if ($custData->save()) {
            $currentId = $custData::get()->last()->cust_id;
            // $customerName = $custData::get()->last()->customerName;
            // $landmark = $custData::get()->last()->landmark;
            // $wallNo = $custData::get()->last()->wallNo;
            // $state = $custData::get()->last()->state;
            // $City = $custData::get()->last()->City;
            // $advDate = $custData::get()->last()->advDate;
            // $wallRent = $custData::get()->last()->wallRent;

        }

        // return view("master.customer.add",compact("sData","cData","lastId","currentId","landmark","customerName","advDate"));

        // return redirect()->route("home.add",compact("sData","cData","lastId","currentId","customerName","landmark","wallNo","state","City","advDate","wallRent"));

        return redirect()->route("home.add",compact("sData","cData","lastId","currentId"));

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
                            ->orWhere("landmark","like","%" . $keyword . "%")
                            ->orWhere("cust_id","like","%" . $keyword . "%");
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
    public function edit(Request $request,  customer $customer)
    {
        $id = $request->cust_id;

        $all=  customer::where('cust_id',$id)->get();
        
        return $all;
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

        
        $cust_id = $request->input('cust_id');
        $customerName = $request->input('editcustomerName');
        $address = $request->input('editaddress');
        $landmark = $request->input('editlandmark');
        $wallNo = $request->input('editwallNo');
        $state = $request->input('editstate');
        $city = $request->input('editcity');
        $advDate = $request->input('editadvDate');
        $wallRent = $request->input('editwallRent');

        $updateData = customer::where("cust_id",$cust_id)->update([

            'cust_id' => $cust_id ,
            'customerName' => $customerName ,
            'address' => $address ,
            'landmark' => $landmark ,
            'wallNo' => $wallNo ,
            'state' => $state ,
            'city' => $city ,
            'advDate' => $advDate ,
            'wallRent' => $wallRent
        
        ]);

        $updateSize = size::where("cust_id",$cust_id)->update([

            'landmark' => $landmark,
            'advDate' => $advDate ,

        ]);

        return redirect()->route('home.list');

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



}   
