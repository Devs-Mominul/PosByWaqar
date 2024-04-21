<?php

namespace App\Http\Controllers;

use App\Models\CustomUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserAdminController extends Controller
{
    function user_add(){
        return view('custom_user.user');
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
            'user_password'=>$request->user_password,
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
}
