<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NozleEntry;
use App\Batch;
use App\Product;
use Illuminate\Support\Facades\DB;
use App\customer;


class ReportController extends Controller
{
    function dealerreport(){

        $data = customer::all();
        return view("report.dealerreport",["data"=> $data]);
    }
    
    function totalreport(){

        $data = customer::all();
        return view("report.totalreport",["data"=> $data]);
    }
}
