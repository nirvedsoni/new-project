<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CashVerification;
use App\NozleEntry;
use App\Batch;
use App\Product;
use Illuminate\Support\Facades\DB;

class CashVerificationController extends Controller
{
    function option(Request $request){
        $option = CashVerification::find(1);

        return view("cashverification.option", compact("option"));
    }

    function updateoption(Request $request){
        $status = $request->status;

        $option = CashVerification::find(1);
        $option->status = $status;

        if($option->save()){
            echo true;
        }
        else{
            echo false;
        }
    }

    function unverified(Request $request){
        $cashdetails = NozleEntry::orderBy("realdatetime",'ASC')
                                ->where("cash_status",0)->get();

        return view("cashdetail.unverified",compact("cashdetails"));
    }

   
}
