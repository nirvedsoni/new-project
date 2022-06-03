<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NozleEntry;
use App\Batch;
use App\Product;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    function comulativebatchreport(Request $request){
        $searchFromDate = $request->searchFromDate;
        $searchToDate = $request->searchToDate;
        $reports = [];

        if($searchFromDate && $searchToDate){
            $reports = Batch::selectRaw("GROUP_CONCAT(entryIds) as entryIds")->selectRaw("date(realdatetime) as realdatetime")->whereDate("realdatetime",">=",$searchFromDate)
                            ->whereDate("realdatetime","<=",$searchToDate)
                            ->orderBy("realdatetime","ASC")
                            ->groupByRaw("date(realdatetime)")
                            ->get();
        }

        return view("report.comulativebatchreport", compact("reports","searchFromDate","searchToDate"));
    }
}
