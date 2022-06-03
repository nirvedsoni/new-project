<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    public static function batch_nozles($entryIds){
        $data = NozleEntry::selectRaw("SUM(cash_amount) as cash_amount")->selectRaw("SUM(phonepayswap) as phonepayswap")->selectRaw("SUM(sbiswap) as sbiswap")->selectRaw("SUM(hpclswap) as hpclswap")->selectRaw("SUM(creditsale) as creditsale")->selectRaw("SUM(note_2000) as note_2000")->selectRaw("SUM(note_500) as note_500")->selectRaw("SUM(note_200) as note_200")->selectRaw("SUM(note_100) as note_100")->selectRaw("SUM(note_50) as note_50")->selectRaw("SUM(note_20) as note_20")->selectRaw("SUM(note_10) as note_10")->selectRaw("SUM(note_5) as note_5")->selectRaw("SUM(note_2) as note_2")->selectRaw("SUM(note_1) as note_1")->whereIn("id",explode(",", $entryIds))->first();

        return $data;
    }
    public static function batch_nozle($entryIds){
        $entryId_arr = explode(",", $entryIds);
        sort($entryId_arr);

        $last_entry_id = $entryId_arr[count($entryId_arr)-1];

        $data = NozleEntryItem::where("entryId",$last_entry_id)->get();

        $data_arr = [];

        if(count($data)){
            foreach ($data as $key => $value) {
                $data_arr['closing_reading'][$value->nozleId] = $value->closing_reading;
                $data_arr['test_qty'][$value->productId] = $value->test_qty;
                $data_arr['sale_rate'][$value->productId] = $value->sale_rate;
            }
        }

        return $data_arr;
    }
}
