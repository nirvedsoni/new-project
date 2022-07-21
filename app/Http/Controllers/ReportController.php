<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\customer;
use App\size;


class ReportController extends Controller
{
    function datewisereport(){

        $data = customer::select('landmark')->groupBy('landmark')->get();

        return view("report.datewisereport",["data"=> $data]);
    }
    
    function totalreport(){

        $data = customer::select('landmark')->groupBy('landmark')->get();
        return view("report.totalreport",["data"=> $data]);
        
    }



    
    public function getDatewiseDetail(Request $request){
        $customerLand = $request->landmark;
        $fromDate = $request->fromDate;
        $toDate = $request->toDate;

        $customers = customer::orderBy("wallNo","ASC");

        if($customerLand){
            $customers = $customers->where("landmark",$customerLand);
        }

        if($fromDate && $toDate){
            $customers = $customers->whereBetween("advDate",[$fromDate, $toDate]);
        }

        $customers = $customers->get();

        // $customerSize = size::where("landmark",$customerLand)->get();

        $html = "";
        if(count($customers)){
            foreach ($customers as $key => $value) {
                $html .= '<tr>
                            <th scope="row">' . $value->wallNo . '</th>
                            <td>' . $value->customerName . '</td>
                            <td>' . $value->address . '</td>
                            <td>' . $value->landmark . '</td>
                            <td>' . date("d/m/Y",strtotime($value->advDate)) . '</td>
                            <td class="text-center">
                               <input type="checkbox" class="chkCustomerId" name="prtData" value='. $value->cust_id .'>
                            </td>
                        </tr>';
            }
        }else{
            $html .= '   <tr>
            <td class="text-center text-danger" colspan="6" >Empty</td>
         </tr>';
        };
      
        echo $html;
    }

    
    function printcustomers(Request $request){
        $custmerIds = $request->custIds;

        $customersData = customer::orderBy("wallNo","ASC");

        $customers = $customersData->whereIn("cust_id",$custmerIds)->get();


        return view("master.customer.printcust",["customersData"=> $customers]);

    }
    
}