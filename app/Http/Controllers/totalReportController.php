<?php

namespace App\Http\Controllers;
use App\customer;

use Illuminate\Http\Request;

class totalReportController extends Controller
{
    function printTotalReport(Request $request){
        $customerLand = $request->landmark;

        $totalData = customer::where("landmark",$customerLand)->get();

        // $customerSizes = size::whereIn("cust_id",$custmerIds)->get();

        return view("master.customer.printTotalReport",["totalData"=> $totalData]);

    }
}
