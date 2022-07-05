<?php

namespace App\Http\Controllers;
use App\customer;

use Illuminate\Http\Request;

class totalReportController extends Controller
{
    function printTotalReport(Request $request){
        $customerLand = $request->landmark;
        $fromDate = $request->fromDate;
        $toDate = $request->toDate;

        // $totalData = customer::where("landmark",$customerLand)->get();

        $totalData = new customer;

        if($customerLand){
            $totalData = $totalData->where("landmark",$customerLand);
        }

        if($fromDate && $toDate){
            $totalData = $totalData->whereBetween("advDate",[$fromDate, $toDate]);
        }

        $totalData = $totalData->get();

        // $customerSizes = size::whereIn("cust_id",$custmerIds)->get();

        return view("master.customer.printTotalReport",["totalData"=> $totalData,"landmark"=>$customerLand]);

    }
}
