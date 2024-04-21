<?php

use App\Http\Controllers\CaptainshipBonusController;
use App\Http\Controllers\CreateBonusController;
use App\Http\Controllers\CustomAuthinticationController;
use App\Http\Controllers\CustomProfileController;
use App\Http\Controllers\CustomRole;
use App\Http\Controllers\DepoRegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StockiestController;
use App\Http\Controllers\UserAdminController;
use App\Models\CustomUser;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CustomLoginController;
use App\Http\Controllers\EqualBonusController;
use App\Http\Controllers\GardianShipBonusController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\RankRewardBonusController;
use App\Http\Controllers\RecreatingBonusController;
use App\Http\Controllers\UserInfoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    if(Auth::user()->user_type==0){
        return view('dashboard');

    }
    else if(Auth::user()->user_type==1){
        return view('dashboard.admin');
    }
    else if(Auth::user()->user_type==2){
        return view('dashboard.depo');
    }
    else{
        return view('dashboard.stockist');
    }



   return view('dashboard.admin');


})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::get('/depo/register',[DepoRegisterController::class,'depo_register'])->name('depo.register');
Route::post('/depo/register/post',[DepoRegisterController::class,'depo_register_post'])->name('depo.register.post');
Route::get('/stockiest/register',[StockiestController::class,'stockeist_register'])->name('stockiest.register');
Route::post('/stockiest/register/post',[StockiestController::class,'stockeist_register_post'])->name('stockiest.register.post');
Route::get('/user/add',[UserAdminController::class,'user_add'])->name('user.add');
Route::post('/user/post',[UserAdminController::class,'user_post'])->name('user.post');
Route::post('/custom/profile',[CustomProfileController::class,'custom_photo'])->name('custom.photo');
Route::get('/depo/list',[DepoRegisterController::class,'depo_list'])->name('depo.list');
Route::get('/stockist/list',[StockiestController::class,'stockist_list'])->name('stockist.list');
Route::get('/user/list',[UserAdminController::class,'user_list'])->name('user.list');
Route::get('/custom/role',[CustomRole::class,'custom_role'])->name('custom.role');
Route::post('/custom/role/post',[CustomRole::class,'custom_role_post'])->name('custom.role.post');
Route::post('/login/login', [CustomLoginController::class, 'login'])->name('custom.login');
Route::get('/user/authentication',[CustomAuthinticationController::class,'user'])->name('custom.auth.user');
Route::post('/user/authentication',[CustomAuthinticationController::class,'user_post'])->name('custom.auth.user.post');
Route::get('/admin/authentication',[CustomAuthinticationController::class,'admin'])->name('custom.auth.admin');
Route::post('/admin/authentication',[CustomAuthinticationController::class,'admin_post'])->name('custom.auth.admin.post');
Route::get('/depo/authentication',[CustomAuthinticationController::class,'depo'])->name('custom.auth.depo');
Route::post('/depo/authentication',[CustomAuthinticationController::class,'depo_post'])->name('custom.auth.depo.post');
Route::get('/stockiest/authentication',[CustomAuthinticationController::class,'stockiest'])->name('custom.auth.stockiest');
Route::post('/stockiest/authentication',[CustomAuthinticationController::class,'stockiest_post'])->name('custom.auth.stockiest.post');
Route::get('/user/info',[UserInfoController::class,'user_info'])->name('user.info');
Route::get('/overview/info',[UserInfoController::class,'overview_info'])->name('overview.info');
Route::get('/user/info/profile',[UserInfoController::class,'user_info_profile'])->name('user.info.profile');
Route::post('/user/info/profile/post',[UserInfoController::class,'user_info_profile_post'])->name('user.info.profile.post');
Route::get('/user/info/password',[UserInfoController::class,'user_info_profile_password'])->name('user.info.profile.password');
Route::get('/purchase/bonus',[PurchaseController::class,'purchase_bonus'])->name('purchase.bonus');
Route::get('/create/bonus',[CreateBonusController::class,'create_bonus_list'])->name('create.bonus.list');
Route::get('/re-create/bonus',[RecreatingBonusController::class,'re_create_bonus_list'])->name('re-create.bonus.list');
Route::get('/equal/bonus',[EqualBonusController::class,'equal_bonus_list'])->name('equal.bonus.list');
Route::get('/rank/reward',[RankRewardBonusController::class,'rankreward_list'])->name('rank.reward.bonus');
Route::get('/captainship/bonus',[CaptainshipBonusController::class,'captainship_bonus_list'])->name('captainship.bonus.list');
Route::get('/gardianship/bonus',[GardianShipBonusController::class,'gardianship_bonus_list'])->name('gardianship.bonus.list');









