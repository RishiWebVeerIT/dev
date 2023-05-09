<?php

namespace App\Http\Controllers;
use App\Models\TaxDetail;
use App\Models\OtherTaxDetail;
use App\Models\Residential;
use App\Models\currenttaxdetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class taxdetailController extends Controller
{
    public function TaxDetailStore(Request $request, $id)
    {
        $taxdetail = new TaxDetail();

        $taxdetail->resident_id = $id;
        $taxdetail->plot_area = $request->plot_area;
        $taxdetail->property_type = $request->type_of_Property;
        $taxdetail->uses_factor = $request->uses_factor;
        $taxdetail->floor = $request->floor;
        $taxdetail->construction_type = $request->construction_type;
        $taxdetail->constructed_area = $request->construction_area;
        $taxdetail->rate = $request->rate;
        $taxdetail->year = $request->year_from.' - '.$request->year_to;
        $taxdetail->month_from = $request->month_from;
        $taxdetail->month_to = $request->month_to;
        $taxdetail->tax_type = $request->tax_type;
        $taxdetail->created_by = [
            'fullname'=> Auth::user()->firstname.' '.Auth::user()->middlename.' '.Auth::user()->lastname,
            'id'=> Auth::user()->id(),
            ];

        // $property_value = ($request->construction_area * $request->rate);
        $taxdetail->value = $request->value;
        // $descountedvalue = ($property_value/100*10);
        $taxdetail->dicount = $request->discount;
        // $taxable_property_value = ($property_value - $descountedvalue);
        $taxdetail->taxable_property = $request->taxable_property;


        $taxdetail->save();

        Alert::success('Successfully Added Tax Details');
        return back();

    }


    public function otherTaxDetailStore(Request $request, $id)
    {
        $Ohertaxdetail = new OtherTaxDetail();

        $Ohertaxdetail->resident_id = $id;
        $Ohertaxdetail->year = $request->year_from.' - '.$request->year_to;
        $Ohertaxdetail->month_from = $request->month_from;
        $Ohertaxdetail->tax_type = $request->tax_type;
        $Ohertaxdetail->month_to = $request->month_to;
        $Ohertaxdetail->Property_tax = $request->property_tax;
        $Ohertaxdetail->consolidated_tax = $request->consolidated_tax;
        $Ohertaxdetail->urban_dev_tax = $request->urben_dev_tax;
        $Ohertaxdetail->education_tax = $request->education_tax;
        $Ohertaxdetail->service_tax = $request->service_tax;
        $Ohertaxdetail->water_tax = $request->water_tax;
        $Ohertaxdetail->garbage_tax = $request->garbade_fee;
        $Ohertaxdetail->rebate = $request->rebate;
        $Ohertaxdetail->surcharge_fee = $request->surcharge_fee;
        $Ohertaxdetail->advance_deposit = $request->advance_deposit;
        $Ohertaxdetail->total = $request->total;
        $Ohertaxdetail->created_by = [
            'fullname'=> Auth::user()->firstname.' '.Auth::user()->middlename.' '.Auth::user()->lastname,
            'id'=> Auth::user()->id(),
            ];

        $Ohertaxdetail->save();

        Alert::success('Successfully Added Other Tax Details');
        return back();
    }


    public function LandscapeReciept($id)
    {
        $page_title = 'Reciept';
        $taxdetails = TaxDetail::where('resident_id',$id)->get();
        $otherTax = OtherTaxDetail::where('resident_id',$id)->get();

        $currentTax = currenttaxdetail::findOrFail(1);
        $Property_Tax_Sum = OtherTaxDetail::where('resident_id',$id)->sum('Property_tax')+$currentTax->Property_tax;
        $consolidated_tax_sum = OtherTaxDetail::where('resident_id',$id)->sum('consolidated_tax')+$currentTax->consolidated_tax;
        $urban_dev_tax_sum = OtherTaxDetail::where('resident_id',$id)->sum('urban_dev_tax')+$currentTax->urban_dev_tax;
        $education_tax_sum = OtherTaxDetail::where('resident_id',$id)->sum('education_tax')+$currentTax->education_tax;
        $service_tax_sum = OtherTaxDetail::where('resident_id',$id)->sum('service_tax')+$currentTax->service_tax;
        $water_tax_sum = OtherTaxDetail::where('resident_id',$id)->sum('water_tax')+$currentTax->water_tax;
        $garbage_tax_sum = OtherTaxDetail::where('resident_id',$id)->sum('garbage_tax')+$currentTax->garbage_tax;
        $rebate_sum = OtherTaxDetail::where('resident_id',$id)->sum('rebate')+$currentTax->rebate;
        $surcharge_fee_sum = OtherTaxDetail::where('resident_id',$id)->sum('surcharge_fee')+$currentTax->surcharge_fee;
        $advance_deposit_sum = OtherTaxDetail::where('resident_id',$id)->sum('advance_deposit')+$currentTax->advance_deposit;
        $total_sum = OtherTaxDetail::where('resident_id',$id)->sum('total')+$currentTax->total;

        $data = Residential::findOrFail($id);
        return view('landscapeReciept', compact('page_title','data','taxdetails','otherTax',
        'Property_Tax_Sum',
        'consolidated_tax_sum',
        'urban_dev_tax_sum',
        'education_tax_sum',
        'service_tax_sum',
        'water_tax_sum',
        'garbage_tax_sum',
        'rebate_sum',
        'surcharge_fee_sum',
        'advance_deposit_sum',
        'total_sum',
        'currentTax'
        ));

    }

    public function PotraitReciept($id)
    {
        $page_title = 'Reciept';
        $taxdetails = TaxDetail::where('resident_id',$id)->first();
        $otherTax = OtherTaxDetail::where('resident_id',$id)->first();

        $data = Residential::findOrFail($id);
        return view('potraitreciept', compact('page_title','data','taxdetails','otherTax'
        ));
    }

    public function mainReciept($id)
    {
        $page_title = 'Reciept';
        $taxdetails = TaxDetail::where('resident_id',$id)->first();
        $otherTax = OtherTaxDetail::where('resident_id',$id)->first();
        $currentTax = currenttaxdetail::findOrFail(1);
        $Property_Tax_Sum = OtherTaxDetail::where('resident_id',$id)->sum('Property_tax')+$currentTax->Property_tax;
        $consolidated_tax_sum = OtherTaxDetail::where('resident_id',$id)->sum('consolidated_tax')+$currentTax->consolidated_tax;
        $urban_dev_tax_sum = OtherTaxDetail::where('resident_id',$id)->sum('urban_dev_tax')+$currentTax->urban_dev_tax;
        $education_tax_sum = OtherTaxDetail::where('resident_id',$id)->sum('education_tax')+$currentTax->education_tax;
        $service_tax_sum = OtherTaxDetail::where('resident_id',$id)->sum('service_tax')+$currentTax->service_tax;
        $water_tax_sum = OtherTaxDetail::where('resident_id',$id)->sum('water_tax')+$currentTax->water_tax;
        $garbage_tax_sum = OtherTaxDetail::where('resident_id',$id)->sum('garbage_tax')+$currentTax->garbage_tax;
        $rebate_sum = OtherTaxDetail::where('resident_id',$id)->sum('rebate')+$currentTax->rebate;
        $surcharge_fee_sum = OtherTaxDetail::where('resident_id',$id)->sum('surcharge_fee')+$currentTax->surcharge_fee;
        $advance_deposit_sum = OtherTaxDetail::where('resident_id',$id)->sum('advance_deposit')+$currentTax->advance_deposit;
        $total_sum = OtherTaxDetail::where('resident_id',$id)->sum('total')+$currentTax->total;

        $data = Residential::findOrFail($id);

        return view('mainreciept', compact('page_title','data','taxdetails','otherTax','Property_Tax_Sum','consolidated_tax_sum','urban_dev_tax_sum','education_tax_sum','service_tax_sum','water_tax_sum','garbage_tax_sum','rebate_sum','surcharge_fee_sum','advance_deposit_sum','total_sum','currentTax'
        ));
    }

public function monthlyTaxDetail($id)
{
    $page_title = 'Monthly Tax Details';
    $taxdetails = TaxDetail::where('resident_id',$id)->where('tax_type',0)->get();

    $otherTax = OtherTaxDetail::where('resident_id',$id)->where('tax_type',0)->get();

    $currentTax = currenttaxdetail::latest()->first();
    $Property_Tax_Sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',0)->sum('Property_tax')+$currentTax->Property_tax;
    $consolidated_tax_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',0)->sum('consolidated_tax')+$currentTax->consolidated_tax;
    $urban_dev_tax_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',0)->sum('urban_dev_tax')+$currentTax->urban_dev_tax;
    $education_tax_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',0)->sum('education_tax')+$currentTax->education_tax;
    $service_tax_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',0)->sum('service_tax')+$currentTax->service_tax;
    $water_tax_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',0)->sum('water_tax')+$currentTax->water_tax;
    $garbage_tax_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',0)->sum('garbage_tax')+$currentTax->garbage_tax;
    $rebate_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',0)->sum('rebate')+$currentTax->rebate;
    $surcharge_fee_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',0)->sum('surcharge_fee')+$currentTax->surcharge_fee;
    $advance_deposit_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',0)->sum('advance_deposit')+$currentTax->advance_deposit;
    $total_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',0)->sum('total')+$currentTax->total;


    $data = Residential::findOrFail($id);
    return view('monthlyTaxDetails', compact('page_title','data','taxdetails','otherTax','Property_Tax_Sum','consolidated_tax_sum',
    'urban_dev_tax_sum','education_tax_sum','service_tax_sum','water_tax_sum','garbage_tax_sum','rebate_sum','surcharge_fee_sum',
    'advance_deposit_sum','total_sum','currentTax'
    ));
}


public function yearlyTaxDetail($id)
{
    $page_title = 'Yearly Tax Details';
    $taxdetails = TaxDetail::where('resident_id',$id)->where('tax_type',1)->get();

    $otherTax = OtherTaxDetail::where('resident_id',$id)->where('tax_type',1)->get();

    $currentTax = currenttaxdetail::latest()->first();
    $Property_Tax_Sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',1)->sum('Property_tax')+$currentTax->Property_tax;
    $consolidated_tax_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',1)->sum('consolidated_tax')+$currentTax->consolidated_tax;
    $urban_dev_tax_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',1)->sum('urban_dev_tax')+$currentTax->urban_dev_tax;
    $education_tax_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',1)->sum('education_tax')+$currentTax->education_tax;
    $service_tax_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',1)->sum('service_tax')+$currentTax->service_tax;
    $water_tax_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',1)->sum('water_tax')+$currentTax->water_tax;
    $garbage_tax_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',1)->sum('garbage_tax')+$currentTax->garbage_tax;
    $rebate_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',1)->sum('rebate')+$currentTax->rebate;
    $surcharge_fee_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',1)->sum('surcharge_fee')+$currentTax->surcharge_fee;
    $advance_deposit_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',1)->sum('advance_deposit')+$currentTax->advance_deposit;
    $total_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',1)->sum('total')+$currentTax->total;


    $data = Residential::findOrFail($id);
    return view('yearlyTaxDetails', compact('page_title','data','taxdetails','otherTax','Property_Tax_Sum','consolidated_tax_sum',
    'urban_dev_tax_sum','education_tax_sum','service_tax_sum','water_tax_sum','garbage_tax_sum','rebate_sum','surcharge_fee_sum',
    'advance_deposit_sum','total_sum','currentTax'
    ));
}

public function MonthlyLandscapeReciept($id,$month)
{
    $page_title = 'Reciept';
    $taxdetails = TaxDetail::where('resident_id',$id)->where('tax_type',0)->where('month_from',$month)->get();
    $otherTax = OtherTaxDetail::where('resident_id',$id)->where('tax_type',0)->where('month_from',$month)->get();

    $currentTax = currenttaxdetail::findOrFail(1);
    $Property_Tax_Sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',0)->where('month_from',$month)->sum('Property_tax')+$currentTax->Property_tax;
    $consolidated_tax_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',0)->where('month_from',$month)->sum('consolidated_tax')+$currentTax->consolidated_tax;
    $urban_dev_tax_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',0)->where('month_from',$month)->sum('urban_dev_tax')+$currentTax->urban_dev_tax;
    $education_tax_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',0)->where('month_from',$month)->sum('education_tax')+$currentTax->education_tax;
    $service_tax_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',0)->where('month_from',$month)->sum('service_tax')+$currentTax->service_tax;
    $water_tax_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',0)->where('month_from',$month)->sum('water_tax')+$currentTax->water_tax;
    $garbage_tax_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',0)->where('month_from',$month)->sum('garbage_tax')+$currentTax->garbage_tax;
    $rebate_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',0)->where('month_from',$month)->sum('rebate')+$currentTax->rebate;
    $surcharge_fee_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',0)->where('month_from',$month)->sum('surcharge_fee')+$currentTax->surcharge_fee;
    $advance_deposit_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',0)->where('month_from',$month)->sum('advance_deposit')+$currentTax->advance_deposit;
    $total_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',0)->where('month_from',$month)->sum('total')+$currentTax->total;

    $data = Residential::findOrFail($id);
    return view('reciepts.monthly.landscapeReciept', compact('page_title','data','taxdetails','otherTax',
    'Property_Tax_Sum',
    'consolidated_tax_sum',
    'urban_dev_tax_sum',
    'education_tax_sum',
    'service_tax_sum',
    'water_tax_sum',
    'garbage_tax_sum',
    'rebate_sum',
    'surcharge_fee_sum',
    'advance_deposit_sum',
    'total_sum',
    'currentTax'
    ));

}
public function montlymainReciept($id,$month)
    {
        $page_title = 'Reciept';
        $taxdetails = TaxDetail::where('resident_id',$id)->where('tax_type',0)->where('month_from',$month)->first();
        $otherTax = OtherTaxDetail::where('resident_id',$id)->where('tax_type',0)->where('month_from',$month)->first();
        $currentTax = currenttaxdetail::findOrFail(1);
        $Property_Tax_Sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',0)->where('month_from',$month)->sum('Property_tax')+$currentTax->Property_tax;
        $consolidated_tax_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',0)->where('month_from',$month)->sum('consolidated_tax')+$currentTax->consolidated_tax;
        $urban_dev_tax_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',0)->where('month_from',$month)->sum('urban_dev_tax')+$currentTax->urban_dev_tax;
        $education_tax_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',0)->where('month_from',$month)->sum('education_tax')+$currentTax->education_tax;
        $service_tax_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',0)->where('month_from',$month)->sum('service_tax')+$currentTax->service_tax;
        $water_tax_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',0)->where('month_from',$month)->sum('water_tax')+$currentTax->water_tax;
        $garbage_tax_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',0)->where('month_from',$month)->sum('garbage_tax')+$currentTax->garbage_tax;
        $rebate_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',0)->where('month_from',$month)->sum('rebate')+$currentTax->rebate;
        $surcharge_fee_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',0)->where('month_from',$month)->sum('surcharge_fee')+$currentTax->surcharge_fee;
        $advance_deposit_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',0)->where('month_from',$month)->sum('advance_deposit')+$currentTax->advance_deposit;
        $total_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',0)->where('month_from',$month)->sum('total')+$currentTax->total;

        $data = Residential::findOrFail($id);

        return view('reciepts.monthly.mainReciept', compact('page_title','data','taxdetails','otherTax','Property_Tax_Sum','consolidated_tax_sum','urban_dev_tax_sum','education_tax_sum','service_tax_sum','water_tax_sum','garbage_tax_sum','rebate_sum','surcharge_fee_sum','advance_deposit_sum','total_sum','currentTax'
        ));
    }

    public function monthlyPotraitReciept($id,$month)
    {
        $page_title = 'Reciept';
        $taxdetails = TaxDetail::where('resident_id',$id)->where('tax_type',0)->where('month_from',$month)->first();
        $otherTax = OtherTaxDetail::where('resident_id',$id)->where('tax_type',0)->where('month_from',$month)->first();

        $data = Residential::findOrFail($id);
        return view('potraitreciept', compact('page_title','data','taxdetails','otherTax'
        ));
    }




    public function yearlyLandscapeReciept($id,$yearly)
{
    $page_title = 'Reciept';
    $taxdetails = TaxDetail::where('resident_id',$id)->where('tax_type',1)->where('year',$yearly)->get();
    $otherTax = OtherTaxDetail::where('resident_id',$id)->where('tax_type',1)->where('year',$yearly)->get();

    $currentTax = currenttaxdetail::findOrFail(1);
    $Property_Tax_Sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',1)->where('year',$yearly)->sum('Property_tax')+$currentTax->Property_tax;
    $consolidated_tax_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',1)->where('year',$yearly)->sum('consolidated_tax')+$currentTax->consolidated_tax;
    $urban_dev_tax_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',1)->where('year',$yearly)->sum('urban_dev_tax')+$currentTax->urban_dev_tax;
    $education_tax_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',1)->where('year',$yearly)->sum('education_tax')+$currentTax->education_tax;
    $service_tax_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',1)->where('year',$yearly)->sum('service_tax')+$currentTax->service_tax;
    $water_tax_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',1)->where('year',$yearly)->sum('water_tax')+$currentTax->water_tax;
    $garbage_tax_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',1)->where('year',$yearly)->sum('garbage_tax')+$currentTax->garbage_tax;
    $rebate_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',1)->where('year',$yearly)->sum('rebate')+$currentTax->rebate;
    $surcharge_fee_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',1)->where('year',$yearly)->sum('surcharge_fee')+$currentTax->surcharge_fee;
    $advance_deposit_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',1)->where('year',$yearly)->sum('advance_deposit')+$currentTax->advance_deposit;
    $total_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',1)->where('year',$yearly)->sum('total')+$currentTax->total;

    $data = Residential::findOrFail($id);
    return view('reciepts.yearly.landscapeReciept', compact('page_title','data','taxdetails','otherTax',
    'Property_Tax_Sum',
    'consolidated_tax_sum',
    'urban_dev_tax_sum',
    'education_tax_sum',
    'service_tax_sum',
    'water_tax_sum',
    'garbage_tax_sum',
    'rebate_sum',
    'surcharge_fee_sum',
    'advance_deposit_sum',
    'total_sum',
    'currentTax'
    ));

}
public function yearlymainReciept($id,$yearly)
    {
        $page_title = 'Reciept';
        $taxdetails = TaxDetail::where('resident_id',$id)->where('tax_type',1)->where('year',$yearly)->first();
        $otherTax = OtherTaxDetail::where('resident_id',$id)->where('tax_type',1)->where('year',$yearly)->first();
        $currentTax = currenttaxdetail::findOrFail(1);
        $Property_Tax_Sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',1)->where('year',$yearly)->sum('Property_tax')+$currentTax->Property_tax;
        $consolidated_tax_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',1)->where('year',$yearly)->sum('consolidated_tax')+$currentTax->consolidated_tax;
        $urban_dev_tax_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',1)->where('year',$yearly)->sum('urban_dev_tax')+$currentTax->urban_dev_tax;
        $education_tax_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',1)->where('year',$yearly)->sum('education_tax')+$currentTax->education_tax;
        $service_tax_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',1)->where('year',$yearly)->sum('service_tax')+$currentTax->service_tax;
        $water_tax_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',1)->where('year',$yearly)->sum('water_tax')+$currentTax->water_tax;
        $garbage_tax_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',1)->where('year',$yearly)->sum('garbage_tax')+$currentTax->garbage_tax;
        $rebate_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',1)->where('year',$yearly)->sum('rebate')+$currentTax->rebate;
        $surcharge_fee_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',1)->where('year',$yearly)->sum('surcharge_fee')+$currentTax->surcharge_fee;
        $advance_deposit_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',1)->where('year',$yearly)->sum('advance_deposit')+$currentTax->advance_deposit;
        $total_sum = OtherTaxDetail::where('resident_id',$id)->where('tax_type',1)->where('year',$yearly)->sum('total')+$currentTax->total;

        $data = Residential::findOrFail($id);

        return view('reciepts.yearly.mainReciept', compact('page_title','data','taxdetails','otherTax','Property_Tax_Sum','consolidated_tax_sum','urban_dev_tax_sum','education_tax_sum','service_tax_sum','water_tax_sum','garbage_tax_sum','rebate_sum','surcharge_fee_sum','advance_deposit_sum','total_sum','currentTax'
        ));
    }

    public function yearlyPotraitReciept($id,$yearly)
    {
        $page_title = 'Reciept';
        $taxdetails = TaxDetail::where('resident_id',$id)->where('tax_type',1)->where('year',$yearly)->first();
        $otherTax = OtherTaxDetail::where('resident_id',$id)->where('tax_type',1)->where('year',$yearly)->first();

        $data = Residential::findOrFail($id);
        return view('reciepts.yearly.potraitReciept', compact('page_title','data','taxdetails','otherTax'
        ));
    }
}
