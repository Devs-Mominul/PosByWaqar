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
})->name('welcome');

Route::get('/dashboard', function () {

        return view('dashboard');

})->name('dashboard')->middleware('customer');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::get('/depo/register',[DepoRegisterController::class,'depo_register'])->name('depo.register');
Route::get('/depo/depo/register',[DepoRegisterController::class,'depo_depo_register'])->name('depo.depo.register');
Route::get('/depo/depo/register/user',[DepoRegisterController::class,'depo_depo_register_user'])->name('depo.depo.register.user');
Route::post('/depo/register/post',[DepoRegisterController::class,'depo_register_post'])->name('depo.register.post');
Route::post('/depo/depo/register/post',[DepoRegisterController::class,'depo_depo_register_post'])->name('depo.depo.register.post');
Route::post('/depo/depo/register/post/user',[DepoRegisterController::class,'depo_depo_register_post_user'])->name('depo.depo.register.post.user');
Route::get('/stockiest/register',[StockiestController::class,'stockeist_register'])->name('stockiest.register');
Route::post('/stockiest/register/post',[StockiestController::class,'stockeist_register_post'])->name('stockiest.register.post');
Route::get('/user/add',[UserAdminController::class,'user_add'])->name('user.add');
Route::get('/customer/user/add',[UserAdminController::class,'customer_user_add'])->name('customer.user.add');
Route::post('/user/post',[UserAdminController::class,'user_post'])->name('user.post');
Route::post('/custom/profile',[CustomProfileController::class,'custom_photo'])->name('custom.photo');
Route::get('/depo/list',[DepoRegisterController::class,'depo_list'])->name('depo.list');
Route::get('/depo/depo/list',[DepoRegisterController::class,'depo_depo_list'])->name('depo.depo.list');
Route::get('/depo/depo/list/user',[DepoRegisterController::class,'depo_depo_list_user'])->name('depo.depo.list.user');
Route::get('/stockist/list',[StockiestController::class,'stockist_list'])->name('stockist.list');
Route::get('/user/list',[UserAdminController::class,'user_list'])->name('user.list');
Route::post('/user/user/list/user',[UserAdminController::class,'user_user_list_user'])->name('user.user.list.user');
Route::get('/customer/user/list',[UserAdminController::class,'custom_user_list'])->name('customer.user.list');
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
Route::get('/depo/list/user',[DepoRegisterController::class,'depo_list_user'])->name('depo.list.for.user');
Route::get('/depo/add/user',[DepoRegisterController::class,'add_depo_for_user'])->name('add.depo.for.user');
Route::post('/customer/user/login',[UserAdminController::class,'customer_user_login'])->name('customer.user.login');
Route::get('/user/logout',[UserAdminController::class,'user_logout'])->name('customer.logout');
Route::post('/depo/user/login',[DepoRegisterController::class,'depo_user_login'])->name('depo.user.login');
Route::get('/depo/user/dashboard',[DepoRegisterController::class,'depo_user_dashboard'])->name('depo.user.dashboard')->middleware('depo');;
Route::get('/depo/user/logout',[DepoRegisterController::class,'depo_user_logout'])->name('depo.user.logout');
Route::get('/depo/for/depo',[DepoRegisterController::class,'depo_for_depo'])->name('depo.for.depo');
Route::get('/depo/for/depo/register',[DepoRegisterController::class,'depo_for_depo_register'])->name('depo.for.depo.register');
Route::post('/depo/for/depo/register/post',[DepoRegisterController::class,'depo_for_depo_register_post'])->name('depo.for.depo.register.post');
Route::get('/depo/customer/list/depo',[DepoRegisterController::class,'depo_customer_list_depo'])->name('depo.customer.list.depo');
Route::get('/stockiest/dashboard',[StockiestController::class,'dashboard'])->name('stockiest.dashboard')->middleware('stockiest');
Route::post('/stockiest/dashboard/login',[StockiestController::class,'stockiest_user_login'])->name('stockiest.user.login');
Route::get('/stockiest/logout',[StockiestController::class,'stockiest_user_logout'])->name('stockiest.user.logout');
Route::get('/stockiest/depo/list',[StockiestController::class,'stockiest_depo_list'])->name('stockiest.depo.list');
Route::get('/stockiest/depo/add',[StockiestController::class,'stockiest_depo_add'])->name('stockiest.depo.add');
Route::post('/stockiest/depo/add/post',[StockiestController::class,'stockiest_depo_add_post'])->name('stockiest.depo.add.post');
Route::get('/stockiest/customer/list',[StockiestController::class,'stockiest_customer_list'])->name('stockiest.customer.list');
Route::get('/stockiest/custom/add',[StockiestController::class,'stockiest_custom_add'])->name('stockiest.custom.add');
Route::post('/stockiest/custom/add/post',[StockiestController::class,'stockiest_custom_add_post'])->name('stockiest.custom.add.post');
Route::post('/admin/user/login/post',[UserAdminController::class,'admin_user_login_post'])->name('admin.user.login.post');
Route::get('/admin/user/dashboard/post',[UserAdminController::class,'admin_user_dashboard'])->name('admin.user.dashboard');
Route::get('/stockiest/user/list',[UserAdminController::class,'stockiest_user_list'])->name('stockiest.user.list');
Route::get('/stockiest/user/add',[UserAdminController::class,'stockiest_user_add'])->name('stockiest.user.add');
Route::post('/stockiest/user/add/post',[UserAdminController::class,'stockiest_user_add_post'])->name('stockiest.user.add.post');
Route::get('/stockiest/for/depo/list',[UserAdminController::class,'stockiest_depo_for_list'])->name('stockiest.depo.for.list');
Route::get('/stockiest/for/depo/add',[UserAdminController::class,'stockiest_depo_for_add'])->name('stockiest.depo.for.add');
Route::post('/stockiest/for/depo/add/post',[UserAdminController::class,'stockiest_depo_for_add_post'])->name('stockiest.depo.for.add.post');
Route::get('/stockiest/for/stockiest/list',[UserAdminController::class,'stockiest_stockiest_for_list'])->name('stockiest.stockiest.for.list');
Route::get('/stockiest/for/stockiest/add',[UserAdminController::class,'stockiest_stockiest_for_add'])->name('stockiest.stockiest.for.add');
Route::post('/stockiest/for/stockiest/add/post',[UserAdminController::class,'stockiest_stockiest_for_add_post'])->name('stockiest.stockiest.for.add.post');












