<?php

namespace App\Http\Controllers;

use App\Models\CustomUser;
use App\Models\Stockiest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Depo;
use Illuminate\Support\Carbon;

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
            'password'=>Hash::make($request->stockiest_password),
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
    public function dashboard(){
        return view('dashboard.stockist');
    }
    public function stockiest_user_logout(){
        Auth::guard('stockiest')->logout();
        return redirect()->route('welcome');
    }
    function   stockiest_user_login(Request $request){
        if(Stockiest::where('stockiest_user_id',$request->stockiest_id)->exists()){
            if(Auth::guard('stockiest')->attempt(['stockiest_user_id'=>$request->stockiest_id,'password'=>$request->password])){
                return redirect()->route('stockiest.dashboard');

            }
            else{
                return back()->with('exists','Password Does Not Exists');

            }
           }
           else{
            return back()->with('exists','User Id Does Not Exists');
           }


     }
     function stockiest_depo_list(){
        $depos=Depo::all();
        return view('custom_depo_auth.stockiest_depo_customer',[
            'depos'=>$depos,
        ]);
     }
     function stockiest_depo_add(){
        return view('custom_depo_auth.stockiest_depo_add');
     }
     function stockiest_depo_add_post(Request $request){
        // $num = 0+1;
        // $incr = ++$num;

        //  $sum = 1 + $incr;
        $count=0;
        $count+=1;
        $ids=Str::lower(str_replace(' ','-','DEPO-ITRHCL-000')).random_int(1,100);
        $count=Depo::count()+1;
        $id='depo-itrhcl-000'.$count;



        $depo_id='DEPO-ITRHCL-000'.uniqid();
        Depo::insert([

            'depo_name'=>$request->depo_name,
            'contact_person_name'=>$request->depo_contact_personal_name,
            'contact_number'=>$request->depo_contact_number,
            'depo_email_id'=>$request->depo_email_id,
            'depo_address'=>$request->depo_address,
            'depo_arya'=>$request->depo_arya,
            'depo_user_id'=>$id,


            'password'=>Hash::make($request->depo_user_password)



        ]);
        return  redirect()->route('stockiest.depo.list');

    }
    function stockiest_customer_list(){
        $customers=CustomUser::all();
        return view('custom_user.stockiest_customer_list',[
            'customers'=>$customers,
        ]);
    }
    function stockiest_custom_add(){
        return view('custom_user.stockiest_custom_add');
    }
    function stockiest_custom_add_post(Request $request){
        $user_ref_id= $ids=Str::lower(str_replace(' ','-','STOCKIST-ISP-000')).random_int(1,100).'.'.uniqid();
        $count=CustomUser::count()+1;
        $id='ITRHCL-000'.$count;

        CustomUser::insert([
            'customer_name'=>$request->customer_name,
            'customer_contact_number'=>$request->customer_contact_number,
            'customer_email'=>$request->customer_email,
            'customer_address'=>$request->customer_address,
            'stockiest_id'=>$request->stockiest_id,
            'user_ref_id'=>$request->user_ref_id,
            'place_user_id'=>$request->place_user_id,
            'user_id'=>$id,
            'placement_side'=>$request->place_side,
            'password'=>Hash::make($request->user_password),
            'created_at'=>Carbon::now(),

        ]);
        return  redirect()->route('stockiest.customer.list');

    }
}
