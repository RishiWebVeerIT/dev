<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Residential;
use App\Models\TaxDetail;
use App\Models\currenttaxdetail;
use App\Models\OtherTaxDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
class residentialController extends Controller
{

    public function showAllResident()
    {
        $page_title = 'All Resident';
        $empty_message = 'No user found';
        $resident = Residential::latest()->paginate();
        return view('All_resident', compact('page_title', 'empty_message','resident'));
    }
    public function showResidentForm()
    {
        $page_title = 'Add Resident';
        return view('AddResident', compact('page_title'));
    }
    public function AddResident(Request $request)
    {
        $residentdata = new Residential();

       $residentdata->firstname = $request->first_name;
       $residentdata->middlename = $request->middle_name;
       $residentdata->lastname = $request->last_name;
       $residentdata->email = $request->email;
       $residentdata->aadhar_no = $request->aadhar_no;
       $residentdata->old_property_id = $request->old_property_id;
       $residentdata->new_property_id = $request->new_property_id;
       $residentdata->mobile_no = $request->mobile_no;
       $residentdata->address = [
        'address' => $request->address,
        'city' => $request->city,
        'jila' => $request->jila,
        'taluka' => $request->taluka,
        'zone' => $request->zone,
        'ward' => $request->ward,
        'zip' => $request->zip,
        'state' => $request->state,
        'country' => 'India',
        ];
        $residentdata->status = 1;
       $residentdata->created_by = Auth::user()->id;

       $residentdata->save();
       Alert::success('Successfully Added');
       return back();
    }


    public function showEditResidentForm($id)
    {
        $page_title = 'Edit Resident';
        $data = Residential::findOrFail($id);
        return view('updateResident', compact('page_title','data'));
    }
    public function existing_resident()
    {
        $page_title = 'Existing Resident';
        $data = Residential::All();
        return view('ExistingResident', compact('page_title','data'));
    }

    public function EditResident(Request $request,$id)
    {
        $residentdata = Residential::findOrFail($id);
       $residentdata->firstname = $request->first_name;
       $residentdata->middlename = $request->middle_name;
       $residentdata->lastname = $request->last_name;
       $residentdata->email = $request->email;
       $residentdata->aadhar_no = $request->aadhar_no;
       $residentdata->old_property_id = $request->old_property_id;
       $residentdata->new_property_id = $request->new_property_id;
       $residentdata->mobile_no = $request->mobile_no;
       $residentdata->address = [
        'address' => $request->address,
        'city' => $request->city,
        'jila' => $request->jila,
        'taluka' => $request->taluka,
        'zone' => $request->zone,
        'ward' => $request->ward,
        'zip' => $request->zip,
        'state' => $request->state,
        'country' => 'India',
        ];
    $residentdata->status = $request->status ? 1 : 0;
       $residentdata->modified_by = Auth::user()->id;

       $residentdata->save();
       Alert::success('Successfully Edited');
       return back();
    }


    // Tax

    public function showTaxDetailPage($id)
    {
        $page_title = 'Store Tax Details';
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
        return view('ResidentTaxDetails', compact('page_title','data','taxdetails','otherTax','Property_Tax_Sum','consolidated_tax_sum',
        'urban_dev_tax_sum','education_tax_sum','service_tax_sum','water_tax_sum','garbage_tax_sum','rebate_sum','surcharge_fee_sum',
        'advance_deposit_sum','total_sum','currentTax'
        ));
    }



}
