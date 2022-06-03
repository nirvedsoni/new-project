<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NozleEntry extends Model
{
    static function entryItems($entryId)
    {
        $items = NozleEntryItem::select("nozle_entry_items.*","products.product")->join("products","products.id","=","nozle_entry_items.productId")->where('entryId',$entryId)->get();

        return $items;
    }
}
