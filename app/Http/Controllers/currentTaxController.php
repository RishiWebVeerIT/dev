<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaxDetail;
use App\Models\OtherTaxDetail;
use App\Models\currenttaxdetail;
use App\Models\Residential;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class currentTaxController extends Controller
{
    public function showCurrentTaxForm()
    {
        $ctaxdetails = currenttaxdetail::latest()->get();
        if(!$ctaxdetails)
        {
            $ctax = false;
            $page_title = 'Running Tax Details';
            return view('currentTaxdetails', compact('page_title','ctax'
            ));

        }else{
            $ctax = $ctaxdetails;
            $page_title = 'Running Tax Details';
            return view('currentTaxdetails', compact('page_title','ctax'
            ));
        }
       
    }

    public function CurrentTaxDetailStore(Request $request)
    {
        $crrtaxdetail = new currenttaxdetail();

        $crrtaxdetail->dateFrom = $request->date_from;
        $crrtaxdetail->dateTo = $request->date_to;
        $crrtaxdetail->Property_tax = $request->property_tax;
        $crrtaxdetail->consolidated_tax = $request->consolidated_tax;
        $crrtaxdetail->urban_dev_tax = $request->urben_dev_tax;
        $crrtaxdetail->education_tax = $request->education_tax;
        $crrtaxdetail->service_tax = $request->service_tax;
        $crrtaxdetail->water_tax = $request->water_tax;
        $crrtaxdetail->garbage_tax = $request->garbade_fee;
        $crrtaxdetail->rebate = $request->rebate;
        $crrtaxdetail->surcharge_fee = $request->surcharge_fee;
        $crrtaxdetail->advance_deposit = $request->advance_deposit;
        $crrtaxdetail->total = $request->total;

        $crrtaxdetail->save();

        Alert::success('Successfully Added Tax Details');
        return back();
    }

    public function CurrentTaxDetailUpdate(Request $request)
    {
         $crrtaxdetailn = currenttaxdetail::findOrFail(1);
        $crrtaxdetail->dateFrom = $request->date_from;
        $crrtaxdetail->dateTo = $request->date_to;
        $crrtaxdetail->Property_tax = $request->property_tax;
        $crrtaxdetail->consolidated_tax = $request->consolidated_tax;
        $crrtaxdetail->urban_dev_tax = $request->urben_dev_tax;
        $crrtaxdetail->education_tax = $request->education_tax;
        $crrtaxdetail->service_tax = $request->service_tax;
        $crrtaxdetail->water_tax = $request->water_tax;
        $crrtaxdetail->garbage_tax = $request->garbade_fee;
        $crrtaxdetail->rebate = $request->rebate;
        $crrtaxdetail->surcharge_fee = $request->surcharge_fee;
        $crrtaxdetail->advance_deposit = $request->advance_deposit;
        $crrtaxdetail->total = $request->total;

        $crrtaxdetail->save();

        Alert::success('Successfully Updated Tax Details');
        return back();
    }
}
