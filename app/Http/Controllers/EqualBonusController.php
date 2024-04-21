<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EqualBonusController extends Controller
{
    function equal_bonus_list(){
        return view('equal_bonus.equal_bonus_list');
    }
}
