<?php

namespace App\Http\Controllers;

use App\Models\CustomUser;
use App\Models\Stockiest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserAdminController extends Controller
{
    function user_add(){
        return view('custom_user.user');
    }
    function customer_user_add(){
        return view('custom_user.add_customer');
    }
    function user_post(Request $request){
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
        return  redirect()->route('customer.user.list');

    }
    function user_user_list_user(Request $request){
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
        return  redirect()->route('user.list');

    }
    function user_list(){
        $customers=CustomUser::all();
        return view('custom_user.list',[
            'customers'=>$customers,
        ]);
    }
    function custom_user_list(){
        $customers=CustomUser::all();
        return view('custom_user.custom_user_list',[
            'customers'=>$customers,
        ]);
    }
    function customer_user_login(Request $request){
       if(CustomUser::where('user_id',$request->user_id)->exists()){
        if(Auth::guard('customUser')->attempt(['user_id'=>$request->user_id,'password'=>$request->password])){
            return redirect()->route('dashboard');

        }
        else{
            return back()->with('exists','Password Does Not Exists');

        }
       }
       else{
        return back()->with('exists','User Id Does Not Exists');
       }

    }
    function user_logout(){
        Auth::guard('customUser')->logout();
        return redirect()->route('welcome');
    }
    function admin_user_dashboard(){
        return view('dashboard.admin');
    }
    function admin_user_login_post(Request $request){
        if(User::where('admin_id',$request->admin_id)->exists()){
         if(auth()->attempt(['admin_id'=>$request->admin_id,'password'=>$request->password])){
             return redirect()->route('admin.user.dashboard');

         }
         else{
             return back()->with('exists','Password Does Not Exists');

         }
        }
        else{
         return back()->with('exists','User Id Does Not Exists');
        }

     }
     function stockiest_user_list(){
        $stockiests=Stockiest::all();
        return view('custom_stockiest.stockiest_list_for_user',[
            'stockists'=>$stockiests,
        ]);
     }
     function stockiest_user_add(){
        return view('custom_stockiest.stockiest_add_for_user');
     }
     public function stockiest_user_add_post(Request $request){

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
        return  redirect()->route('stockiest.user.list');
    }
    function stockiest_depo_for_list(){
        $stockiests=Stockiest::all();
        return view('custom_stockiest.stockiest_for_depo_list',[
            'stockists'=>$stockiests,
        ]);
    }
    function stockiest_depo_for_add(){
        return view('custom_stockiest.stockiest_for_depo_add');
    }
    public function stockiest_depo_for_add_post(Request $request){

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
        return  redirect()->route('stockiest.depo.for.list');
    }
    function stockiest_stockiest_for_list(){
        $stockists=Stockiest::all();
        return view('custom_stockiest.stockiest_for_stockiest_list',[
            'stockists'=>$stockists,
        ]);
    }
    function stockiest_stockiest_for_add(){
        return view('custom_stockiest.stockiest_stockiest_add');
    }
    public function stockiest_stockiest_for_add_post(Request $request){

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
        return  redirect()->route('stockiest.stockiest.for.list');
    }


}
