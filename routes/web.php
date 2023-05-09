<?php


use App\Http\Controllers;
use App\Http\Controllers\UserController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\langController;
use App\Http\Controllers\currentTaxController;
use App\Http\Controllers\residentialController;
use App\Http\Controllers\taxdetailController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::post('create_admin', 'UserController@AddAdmin')->name('create_admin');

Route::get('/add-admin', function () {
    return view('add_admin');
});

Route::get('/reciept', function () {
    return view('landscapeReciept');
});
Route::get('language/translate/change',[langController::class,'langChange'])->name('lang.translate.change');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/add-admin', [UserController::class,'AddAdminForm'])->name('add_admin');
    Route::post('/create_admin', [UserController::class,'AddAdmin'])->name('create_admin');

    Route::any('/logout', [loginController::class,'logout'])->name('logout');
    Route::any('/', [loginController::class,'index'])->name('home');

    Route::any('/admin/add-resident', [residentialController::class,'AddResident'])->name('Add/resident');
    Route::any('/add-resident', [residentialController::class,'showResidentForm'])->name('Add_resident');

    Route::any('/edit-resident/{id}', [residentialController::class,'showEditResidentForm'])->name('edit_resident');
    Route::any('/admin/edit-resident/{id}', [residentialController::class,'EditResident'])->name('Edit/resident');

    Route::any('/all-resident', [residentialController::class,'showAllResident'])->name('All_resident');
    Route::any('/existing-resident', [residentialController::class,'existing_resident'])->name('existing.resident');

    Route::any('/resident/tax-details/{id}', [residentialController::class,'showTaxDetailPage'])->name('resident.tax.details');
    Route::any('/resident-tax-details-save/{id}', [taxdetailController::class,'TaxDetailStore'])->name('resident.tax.details.save');
    Route::any('/resident-othertax-details-save/{id}', [taxdetailController::class,'otherTaxDetailStore'])->name('resident.othertax.details.save');

    Route::any('/landscape/reciept/{id}', [taxdetailController::class,'LandscapeReciept'])->name('resident.tax.landscape.reciept');
    Route::any('/landscape/reciept/{id}/{month}', [taxdetailController::class,'MonthlyLandscapeReciept'])->name('resident.tax.monthly.landscape.reciept');
    Route::any('/landscape/yearly/reciept/{id}/{year}', [taxdetailController::class,'yearlyLandscapeReciept'])->name('resident.tax.yearly.landscape.reciept');

    Route::any('/potrait/reciept/{id}', [taxdetailController::class,'PotraitReciept'])->name('resident.tax.potrait.reciept');

    Route::any('/potrait/monthly/reciept/{id}/{monthly}', [taxdetailController::class,'monthlyPotraitReciept'])->name('resident.tax.potrait.monthly.reciept');

    Route::any('/potrait/yearly/reciept/{id}/{year}', [taxdetailController::class,'yearlyPotraitReciept'])->name('resident.tax.potrait.yearly.reciept');


    // Route::any('/potrait/main/abc/reciept/{id}', [taxdetailController::class,'mainReciept'])->name('resident.tax.main.reciept');

    Route::any('/potrait/main/reciept/{id}/{month}', [taxdetailController::class,'montlymainReciept'])->name('resident.tax.monthly.potrait.reciept');
    Route::any('/potrait/yearly/main/reciept/{id}/{year}', [taxdetailController::class,'yearlymainReciept'])->name('resident.tax.yearly.main.reciept');


    Route::any('/current-tax-details', [currentTaxController::class,'showCurrentTaxForm'])->name('current.tax');

    Route::any('/resident-currtax-details-save', [currentTaxController::class,'CurrentTaxDetailStore'])->name('resident.currtax.details.save');
    Route::any('/resident-currtax-details-update', [currentTaxController::class,'CurrentTaxDetailUpdate'])->name('resident.currtax.details.update');
    Route::any('/monthly-tax-details/{id}', [taxdetailController::class,'monthlyTaxDetail'])->name('monthly.tax.details');
    Route::any('/yearly-tax-details/{id}', [taxdetailController::class,'yearlyTaxDetail'])->name('yearly.tax.details');
});
Route::group(['middleware' => ['guest']], function () {
    Route::any('/loginCheck', [loginController::class,'checkLogin'])->name('check_login');
    Route::any('/login', [loginController::class,'Login'])->name('login');
});

