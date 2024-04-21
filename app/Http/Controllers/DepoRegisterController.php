<?php

namespace App\Http\Controllers;

use App\Models\Depo;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DepoRegisterController extends Controller
{
    function depo_register(){
        return view('custom_depo_auth.depo');
    }
    function depo_register_post(Request $request){
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


            'depo_user_password'=>$request->depo_user_password



        ]);
        return  redirect()->route('depo.list');

    }
    function depo_list(){
        $depos=Depo::all();
        return view('custom_depo_auth.list_depo',[
            'depos'=>$depos,
        ]);
    }

}
