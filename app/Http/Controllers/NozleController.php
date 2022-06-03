<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nozle;
use App\NozleEntryItem;
use App\Product;

class NozleController extends Controller
{
    function list(Request $request){
        $nozles = Nozle::select("nozles.*","products.product")->join("products","products.id","=","nozles.productId")->orderByRaw('CONVERT(nozles.orderNo, SIGNED) ASC')->get();
        $products = Product::orderByRaw('CONVERT(orderNo, signed) ASC')->get();

        return view('nozle.list',compact("nozles","products"));
    }

    function store(Request $request){
        $nozle = $request->nozle;
        $openning_reading = $request->openning_reading;
        $productId = $request->productId;
        $orderNo = $request->orderNo;
        $status = 0;

        $noz = new Nozle;

        $noz->nozle = $nozle;
        $noz->openning_reading = $openning_reading;
        $noz->closing_reading = $openning_reading;
        $noz->productId = $productId;
        $noz->status = $status;
        $noz->orderNo = $orderNo;

        if($noz->save()){
            echo true;
        }
        else{
            echo false;
        }
    }

    function update(Request $request){
        $id = base64_decode($request->id);

        $nozle = $request->nozle;
        $productId = $request->productId;
        $orderNo = $request->orderNo;

        $noz = Nozle::find($id);

        $noz->nozle = $nozle;
        $noz->productId = $productId;
        $noz->orderNo = $orderNo;
        if($noz->save()){
            echo true;
        }
        else{
            echo false;
        }
    }

    function update_status(Request $request){
        $id = base64_decode($request->id);

        $status = $request->status;

        $noz = Nozle::find($id);

        $noz->status = $status;
        if($noz->save()){
            echo true;
        }
        else{
            echo false;
        }
    }

    function delete(Request $request){
        $id = base64_decode($request->id);

        $entry_count = NozleEntryItem::where("nozleId",$id)->count();

        if(!$entry_count){
            $nozle = Nozle::find($id);

            if($nozle->delete()){
                echo '1';
            }
            else{
                echo "Something went wrong!";
            }
        }
        else{
            echo "Nozle have depenedency!";
        }
    }
}
