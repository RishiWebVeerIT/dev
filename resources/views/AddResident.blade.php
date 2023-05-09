@extends('layouts.master')
@section('page-title',$page_title)
@section('section')
<div class="bg-light pd-60px">
<form action="{{route('Add/resident')}}" method="post">
    @csrf
    <h3 class="mb-t-b-30">{{lang('form.personal_information')}}</h3>
    <div class="row">
      <div class="form-group col-md-4">
        <label for="first_name"><span class="text-danger">*</span>{{lang('form.firstname')}}</label>
        <input type="text" name="first_name" class="form-control mb-3" placeholder={{lang('form.firstname')}} required>
      </div>
      <div class="form-group col-md-4">
        <label for="middle_name"><span class="text-danger">*</span>{{lang('form.middlename')}}</label>
        <input type="text" name="middle_name" class="form-control mb-3" placeholder={{lang('form.middlename')}} required>
      </div>
      <div class="form-group col-md-4">
        <label for="last_name"><span class="text-danger">*</span>{{lang('form.lastname')}}</label>
        <input type="text" name="last_name" class="form-control mb-3"  placeholder={{lang('form.lastname')}} required>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-4">
        <label for="aadhar_no"><span class="text-danger">*</span>{{lang('form.aadhar_no')}} : </label>
        <input type="text" name="aadhar_no"  placeholder={{lang('form.aadhar_no')}} class="form-control mb-3" required>
      </div>
      <div class="form-group col-md-4">
        <label for="mobile_no"><span class="text-danger">*</span>{{lang('form.mobile_no')}} : </label>
        <input type="text" name="mobile_no"  placeholder={{lang('form.mobile_no')}} class="form-control mb-3" required>
      </div>
      <div class="form-group col-md-4">
        <label for="email"><span class="text-danger">*</span>{{lang('form.email')}} : </label>
        <input type="email" name="email"  placeholder={{lang('form.email')}} class="form-control mb-3" required>
      </div>
      <div class="form-group col-md-6">
        <label for="old_property_id"><span class="text-danger">*</span>{{lang('form.old_property_id')}} : </label>
        <input type="text" name="old_property_id"  placeholder={{lang('form.old_property_id')}} Property ID class="form-control mb-3" required>
      </div>
      <div class="form-group col-md-6">
        <label for="new_property_id"><span class="text-danger">*</span>{{lang('form.new_property_id')}} : </label>
        <input type="text" name="new_property_id" placeholder={{lang('form.new_property_id')}} Property ID class="form-control mb-3" required>
      </div>

      <h3 class="mb-t-b-30">{{lang('form.address')}}</h3>
      <div class="form-group col-md-6">
      <label for="inputAddress"><span class="text-danger">*</span>{{lang('form.address')}}</label>
      <input type="text" class="form-control mb-3" name="address" id="inputAddress" placeholder={{lang('form.address')}} required>
    </div>
    <div class="form-group col-md-3">
        <label for="City"><span class="text-danger">*</span>{{lang('form.city')}} : </label>
        <input type="text" name="city" class="form-control mb-3"  placeholder={{lang('form.city')}} required>
      </div>
      <div class="form-group col-md-3">
        <label for="taluka"><span class="text-danger">*</span>{{lang('form.taluka')}}</label>
        <select id="taluka" name="taluka" class="form-control mb-3" required>
          <option selected>{{lang('city.Amravati')}}</option>
          <option> {{lang('city.Achalpur')}}</option>
          <option> {{lang('city.Warud')}}</option>
          <option> {{lang('city.Chandurbazar')}}</option>
          <option> {{lang('city.Dharni')}}</option>
          <option> {{lang('city.Morshi')}}</option>
          <option> {{lang('city.Daryapur')}}</option>
          <option> {{lang('city.Anjangaon-Surji')}}</option>
          <option> {{lang('city.Dhamangaon-Railway')}}</option>
          <option> {{lang('city.Nandgaon-Khandeshwar')}}</option>
          <option> {{lang('city.Chikhaldara')}}</option>
          <option> {{lang('city.Bhatkuli')}}</option>
          <option> {{lang('city.Teosa')}}</option>
          <option> {{lang('city.Chandur-Railway')}}</option>
        </select>
      </div>
      <div class="form-group col-md-3">
        <label for="jila"><span class="text-danger">*</span>{{lang('form.jila')}}</label>
        <select id="jila" name="jila" class="form-control mb-3" required>
            <option selected>{{lang('city.Amravati')}}</option>
            <option> {{lang('city.Achalpur')}}</option>on>
        </select>
      </div>
      <div class="form-group col-md-2">
        <label for="ward"><span class="text-danger">*</span>{{lang('form.ward')}}</label>
        <select id="ward" name="ward" class="form-control mb-3" required>
            <option selected>0</option>
            <option>1</option>
            <option>2</option>
          </select>
      </div>
      <div class="form-group col-md-2">
        <label for="zone"><span class="text-danger">*</span>{{lang('form.zone')}}</label>
        <input type="text" name="zone" class="form-control"  placeholder={{lang('form.zone')}} id="inputZip" required>
      </div>
      <div class="form-group col-md-2">
        <label for="zip"><span class="text-danger">*</span>{{lang('form.zip')}}</label>
        <input type="text" name="zip" class="form-control"  placeholder={{lang('form.zip')}} id="inputZip" required>
      </div>
      <div class="form-group col-md-3">
        <label for="state"><span class="text-danger">*</span>{{lang('form.state')}}</label>
        <input type="text" name="state" class="form-control"  placeholder={{lang('form.state')}} id="inputZip" required>
      </div>
    </div>
<br><br>
    <button type="submit" class="btn btn-warning">{{lang('form.add_resident')}}</button>
  </form>
</div>
@endsection
