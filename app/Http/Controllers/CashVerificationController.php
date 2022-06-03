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
        // $cashdetails = NozleEntry::orderBy("realdatetime",'ASC')
        //                         ->where("cash_status",0)
        //                         ->where(function($qry){
        //                             $qry->whereNotNull('note_2000')
        //                                 ->orWhereNotNull('note_500')
        //                                 ->orWhereNotNull('note_200')
        //                                 ->orWhereNotNull('note_100')
        //                                 ->orWhereNotNull('note_50')
        //                                 ->orWhereNotNull('note_20')
        //                                 ->orWhereNotNull('note_10')
        //                                 ->orWhereNotNull('note_5')
        //                                 ->orWhereNotNull('note_2')
        //                                 ->orWhereNotNull('note_1');
        //                         })->get();

        return view("cashdetail.unverified",compact("cashdetails"));
    }

    function verifycashdetail(Request $request){
        $entryId = base64_decode($request->entryId);

        $entry = NozleEntry::find($entryId);

        $entry->cash_status = 1;
        if($entry->save()){
            echo true;
        }
        else{
            echo false;
        }
    }

    function verified(Request $request){
        
        $batches = NozleEntry::selectRaw("GROUP_CONCAT(nozle_entries.id) ids")->join("batches",DB::raw("FIND_IN_SET(nozle_entries.id,batches.entryIds)"),">",DB::raw("0"))->orderBy("nozle_entries.realdatetime",'ASC')->where("cash_status",1)->first();
        $ids = [];
        if($batches->ids){
            $ids = explode(",", $batches->ids);
        }
        $cashdetails = NozleEntry::orderBy("realdatetime",'ASC')->where("cash_status",1)->whereNotIn("id",$ids)->get();
        // $cashdetails = NozleEntry::select("nozle_entries.*")->join("batches",DB::raw("FIND_IN_SET(nozle_entries.id,batches.entryIds)"),">",DB::raw("0"))->orderBy("realdatetime",'ASC')->where("cash_status",1)->get();

        return view("cashdetail.verified",compact("cashdetails"));
    }

    function createbatch(Request $request){
        $entryIds = $request->entryIds;

        $entry = NozleEntry::selectRaw("SUM(cash_amount) total_cash_amount")->whereIn("id",$entryIds)->first();
        $entrydate = NozleEntry::find($entryIds[0]);

        $batch = new Batch;

        $batch->entryIds = implode(",", $entryIds);
        $batch->total_cash_amount = $entry->total_cash_amount;
        $batch->realdatetime = $entrydate->realdatetime;
        if($batch->save()){
            echo true;
        }
        else{
            echo false;
        }
    }

    function batches(Request $request){
        $searchFromDate = $request->searchFromDate;
        $searchToDate = $request->searchToDate;
        $query = Batch::orderBy("realdatetime","DESC");

        if($searchFromDate && $searchToDate){
            $query = $query->whereDate("realdatetime",">=",$searchFromDate)->whereDate("realdatetime","<=",$searchToDate);
        }

        $batches = $query->get();

        return view("cashdetail.batches", compact("batches","searchFromDate","searchToDate"));
    }

    function deletebatch(Request $request){
        $id = base64_decode($request->id);

        $batch = Batch::find($id);
        if($batch->delete()){
            echo true;
        }
        else{
            echo false;
        }
    }

    function viewbatch(Request $request, $batchId){
        $batchId = base64_decode($batchId);

        $batch = Batch::find($batchId);
        $entryIds = explode(",", $batch->entryIds);

        $entries = NozleEntry::whereIn("id",$entryIds)->get();
        $products = Product::get();

        return view("cashdetail.viewbatch",compact("batch","entries","products"));
    }

    function printbatch(Request $request){
        $batchId = base64_decode($request->batchId);

        $batch = Batch::find($batchId);
        $entryIds = explode(",", $batch->entryIds);

        $entries = NozleEntry::whereIn("id",$entryIds)->get();
        $products = Product::get();

        return view("cashdetail.printbatch",compact("batch","entries","products"));
    }
}
