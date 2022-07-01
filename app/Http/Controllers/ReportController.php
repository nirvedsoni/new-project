<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\customer;
use App\size;


class ReportController extends Controller
{
    function datewisereport(){

        $data = customer::all();
        return view("report.dealerreport",["data"=> $data]);
    }
    
    function totalreport(){

        $data = customer::all();
        return view("report.totalreport",["data"=> $data]);
    }



    
    public function getDealerDetail(Request $request){
        $customerLand = $request->landmark;

        $customers = customer::where("landmark",$customerLand)->get();

        $customerSize = size::where("landmark",$customerLand)->get();

        $html = "";
        if(count($customers)){
            foreach ($customers as $key => $value) {
                $html .= '<tr>
                            <th scope="row">' . ($key + 1) . '</th>
                            <td>' . $value->cust_id . '</td>
                            <td>' . $value->customerName . '</td>
                            <td>' . $value->address . '</td>
                            <td>' . $value->landmark . '</td>
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

        // if(count($customerSize)){
        //        $html .= 
        //                '<tr class="text-primary">
        //                      <th scope="col">S.No.</th>
        //                      <th scope="col">CUST.ID</th>
        //                      <th scope="col">SIZE</th>
        //                      <th scope="col">NOS</th>
        //                      <th scope="col">SQUARE FEET</th>
        //                      <th scope="col" class="text-center">PRINT</th>
        //                 </tr>';

        //     foreach ($customerSize as $key => $value) {
        //         $html .= 
        //               '<tr>
        //                     <th scope="row">' . ($key + 1) . '</th>
        //                     <td>' . $value->cust_id . '</td>
        //                     <td>' . $value->size . '</td>
        //                     <td>' . $value->nos . '</td>
        //                     <td>' . $value->squareFeet . '</td>
        //                     <td class="text-center">
        //                     <input type="checkbox" class="chkSizeId" name="sizeData" value='. $value->id .'>
        //                     </td>
        //                 </tr>';
        //     }
        // }
      
        echo $html;
    }

    
    function printcustomers(Request $request){
        $custmerIds = $request->custIds;

        $customersData = customer::whereIn("cust_id",$custmerIds)->get();

        $customerSizes = size::whereIn("cust_id",$custmerIds)->get();

        return view("master.customer.printcust",["customersData"=> $customersData,"customerSizes"=> $customerSizes]);

    }
    
}