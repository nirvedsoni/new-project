<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\NozleEntryItem;
use App\Nozle;

class ProductController extends Controller
{
    function list(Request $request){
        $products = Product::orderByRaw('CONVERT(orderNo, signed) ASC')->get();
        return view('product.list',compact("products"));
    }

    function store(Request $request){
        $product = $request->product;
        $orderNo = $request->orderNo;

        $pro = new Product;

        $pro->product = $product;
        $pro->orderNo = $orderNo;
        if($pro->save()){
            echo true;
        }
        else{
            echo false;
        }
    }

    function update(Request $request){
        $id = base64_decode($request->id);
        $product = $request->product;
        $orderNo = $request->orderNo;

        $pro = Product::find($id);

        $pro->product = $product;
        $pro->orderNo = $orderNo;
        if($pro->save()){
            echo true;
        }
        else{
            echo false;
        }
    }

    function delete(Request $request){
        $id = base64_decode($request->id);

        $nozle_count = Nozle::where("productId",$id)->count();
        $entry_count = NozleEntryItem::where("productId",$id)->count();

        if(!$entry_count && !$nozle_count){
            $product = Product::find($id);

            if($product->delete()){
                echo '1';
            }
            else{
                echo "Something went wrong!";
            }
        }
        else{
            echo "Product have dependency!";
        }
    }
}
