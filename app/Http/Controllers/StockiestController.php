<?php

namespace App\Http\Controllers;

use App\Models\Stockiest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class StockiestController extends Controller
{
    public function stockeist_register(){
        return view('custom_stockiest.stockiest');
    }
    public function stockeist_register_post(Request $request){

        // $ids=Str::lower(str_replace(' ','-','STOCKIST-ISP-000')).random_int(1,100);
        //$id = IdGenerator::generate(['table' => 'stockiests', 'length' => 10, 'prefix' =>'CUST-']);
        $count=Stockiest::count()+1;
        $id='stockiest-isp-000'.$count;


        Stockiest::insert([
            'stockiest_name'=>$request->stockiest_name,
            'stockiest_contact_person_name'=>$request->stockiest_contact_person_name,
            'contact_number'=>$request->contact_number,
            'stockiest_email_id'=>$request->stockiest_email,
            'stockiest_address'=>$request->stockiest_address,
            'depo_id'=>$request->depo_id,
            'stockiest_arya'=>$request->stockiest_arya,
            'stockiest_user_id'=>$id,
            'stockiest_user_password'=>$request->stockiest_password,
            'stockiest_ref_id'=>$request->stockiest_ref,



        ]);
        return  redirect()->route('stockist.list');
    }
    public function stockist_list(){
        $stockists=Stockiest::all();
        return view('custom_stockiest.stockist_list',[
            'stockists'=>$stockists,
        ]);
    }
}
