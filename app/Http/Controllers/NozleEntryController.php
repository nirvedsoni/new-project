<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NozleEntry;
use App\NozleEntryItem;
use App\Nozle;
use App\Product;
use App\CashVerification;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PdfExport;

use Session;

class NozleEntryController extends Controller
{
    function add(Request $request){
        $nozles = Nozle::select("nozles.*","products.product")->join("products","products.id","=","nozles.productId")->orderByRaw('CONVERT(nozles.orderNo, SIGNED) ASC')->where("status",0)->get();
        $products = Product::orderByRaw('CONVERT(orderNo, signed) ASC')->get();

        return view("nozleentry.add",compact("nozles","products"));
    }

    function store(Request $request){
        $nozleIds = $request->nozleId;
        $openning_readings = $request->openning_reading;
        $productIds = $request->productId;
        $closing_readings = $request->closing_reading;
        $test_qtys = $request->test_qty;
        $sale_rates = $request->sale_rate;

        $realdatetime = $request->realdatetime;
        $sbiswap = $request->sbiswap;
        if(!$sbiswap){
            $sbiswap = 0;
        }
        $hpclswap = $request->hpclswap;
        if(!$hpclswap){
            $hpclswap = 0;
        }
        $phonepayswap = $request->phonepayswap;
        if(!$phonepayswap){
            $phonepayswap = 0;
        }
        $creditsale = $request->creditsale;
        if(!$creditsale){
            $creditsale = 0;
        }

        $entry = new NozleEntry;

        $entry->realdatetime = date("Y-m-d H:i:s", strtotime($realdatetime));
        $entry->sbiswap = round($sbiswap,2);
        $entry->hpclswap = round($hpclswap,2);
        $entry->phonepayswap = round($phonepayswap,2);
        $entry->creditsale = round($creditsale,2);

        if($entry->save()){
            $entryId = $entry->id;

            if(count($nozleIds)){
                $totalamount = 0;

                foreach ($nozleIds as $key => $nozleId) {
                    $openning_reading = $openning_readings[$nozleId];
                    $closing_reading = $closing_readings[$nozleId];
                    $productId = $productIds[$nozleId];
                    // $sale = $sales[$nozleId];
                    $sale = $closing_reading - $openning_reading;
                    $test_qty = $test_qtys[$nozleId];

                    $net_sale = $sale - $test_qty;

                    $sale_rate = $sale_rates[$productId];

                    $amount = $net_sale*$sale_rate;
                    $totalamount += $amount;

                    $nozle = Nozle::find($nozleId);

                    $entryItem = new NozleEntryItem;

                    $entryItem->entryId = $entryId;
                    $entryItem->nozleId = $nozleId;
                    $entryItem->nozle = $nozle->nozle;
                    $entryItem->openning_reading = round($openning_reading,3);
                    $entryItem->closing_reading = round($closing_reading,3);
                    $entryItem->sale = round($sale,2);
                    $entryItem->test_qty = round($test_qty,2);
                    $entryItem->net_sale = round($net_sale,2);
                    $entryItem->productId = $productId;
                    $entryItem->sale_rate = round($sale_rate,2);
                    $entryItem->amount = round($amount,2);

                    $entryItem->save();

                    $nozle->closing_reading = round($closing_reading,2);
                    $nozle->save();
                }
                $cash_amount = $totalamount - $sbiswap - $hpclswap - $phonepayswap - $creditsale;

                $entry1 = NozleEntry::find($entryId);
                $entry1->totalamount = round($totalamount,2);
                // $entry1->cash_amount = round($cash_amount,2);
                $entry1->cash_amount = floor($cash_amount);

                $entry1->save();

                foreach ($sale_rates as $productId => $sale_rate) {
                    $product = Product::find($productId);

                    $product->sale_rate = round($sale_rate,2);
                    $product->save();
                }
            }

            Session::flash('success', 'Entry saved successfully!');
            Session::put('entryId', $entryId);
            Session::put('cash_amount', floor($cash_amount));
        }
        else{
            Session::flash('error', 'Something went wrong!');
        }

        return redirect()->back();
    }

    function updatenotecount(Request $request){
        $entryId = $request->entryId;
        $notes = $request->notes;

        $option = CashVerification::find(1);

        if(count($notes)){
            foreach ($notes as $note => $count) {
                $entry = NozleEntry::find($entryId);
                $entry->cash_status = $option->status;

                switch ($note) {
                    case '2000':
                        $entry->note_2000 = $count;
                        break;
                    case '500':
                        $entry->note_500 = $count;
                        break;
                    case '200':
                        $entry->note_200 = $count;
                        break;
                    case '100':
                        $entry->note_100 = $count;
                        break;
                    case '50':
                        $entry->note_50 = $count;
                        break;
                    case '20':
                        $entry->note_20 = $count;
                        break;
                    case '10':
                        $entry->note_10 = $count;
                        break;
                    case '5':
                        $entry->note_5 = $count;
                        break;
                    case '2':
                        $entry->note_2 = $count;
                        break;
                    case '1':
                        $entry->note_1 = $count;
                        break;
                    
                    default:
                        break;
                }

                $entry->save();
            }
            // Session::forget('entryId');

            echo true;
        }
        else{
            echo false;
        }
    }

    function print(Request $request){
        $entryId = $request->entryId;

        $entry = NozleEntry::find($entryId);
        $entryItems = NozleEntryItem::select("nozle_entry_items.*","products.product")->join("products","products.id","=","nozle_entry_items.productId")->where("entryId",$entryId)->get();

        return view("nozleentry.print",compact("entry","entryItems"));
    }

    function downloadpdf(Request $request, $entryId){
        $filename = "nozleentry.pdf";
        return Excel::download(new PdfExport($entryId), $filename);
    }

    // function list(Request $request){
    //     Session::forget('entryId');
    //     Session::forget('nozle_cash_amount');
    //     $searchFromDate = $request->searchFromDate;
    //     $searchToDate = $request->searchToDate;

    //     $entries = NozleEntry::orderBy("realdatetime","DESC");

    //     if($searchFromDate && $searchToDate){
    //         // $entries = $entries->whereBetween("realdatetime",[$searchFromDate,$searchToDate]);
    //         $entries = $entries->whereDate("realdatetime",">=",$searchFromDate);
    //         $entries = $entries->whereDate("realdatetime","<=",$searchToDate);
    //     }

    //     $entries = $entries->paginate(50);

    //     return view("nozleentry.list",compact("entries","searchFromDate","searchToDate"));
    // }

    function view(Request $request, $entryId){
        $id = base64_decode($entryId);

        $entry = NozleEntry::find($id);
        // $entryItems = NozleEntryItem::where("entryId",$id)->get();
        $entryItems = NozleEntryItem::select("nozle_entry_items.*","products.product")->join("products","products.id","=","nozle_entry_items.productId")->where("entryId",$id)->get();

        $latest_entry = NozleEntry::orderBy("realdatetime","DESC")->limit(1)->first();

        return view("nozleentry.view",compact("entry","entryItems","latest_entry"));
    }

    function delete(Request $request){
        $entryId = $request->entryId;

        $entry = NozleEntry::find($entryId);
        if($entry->delete()){
            $nozleEntryItems = NozleEntryItem::where("entryId",$entryId)->get();

            foreach ($nozleEntryItems as $key => $value) {
                $nozle = Nozle::find($value->nozleId);

                $nozle->closing_reading = $value->openning_reading;
                $nozle->save();
            }

            NozleEntryItem::where("entryId", $entryId)->delete();

            echo true;
        }
        else{
            echo false;
        }
    }
}
