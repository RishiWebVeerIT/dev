@extends('layouts.master')
@section('page-title', $page_title)
@section('section')
<div class="bg-light pd-60px mt-20">
@if($ctax)
@php
$month = date('M');
$nmonth = date('m',strtotime($month));
$dateObj = DateTime::createFromFormat('!m', $nmonth);
@endphp
{{$nmonth}}
{{$dateObj->format('F');}}
@foreach($ctax as $tax)
<form action="{{route('resident.currtax.details.update')}}" method="post">
        @csrf
        <div class="row">
            <h3 class="mb-t-b-30">{{lang('form.running_year_taxes')}}</h3>
            <div class="form-group col-md-3">
                <label for="date_from"><span class="text-danger">*</span>{{lang('form.from')}}</label>
                <input class="date_from form-control" value="{{$tax->dateFrom}}" id="date_from" name="date_from" style="width: 100%;"
                    type="text">
            </div>
            <div class="form-group col-md-3">
                <label for="date_to"><span class="text-danger">*</span>{{lang('form.to')}} </label><small class="date-error text-danger"></small>
                <input class="date_to form-control" value="{{$tax->dateTo}}"  name="date_to" id="date_to" style="width: 100%;" type="text">
            </div>
            <div class="form-group col-md-3">
                <label for="property_tax"><span class="text-danger">*</span>{{lang('form.property_tax')}}</label>
                <input type="text" name="property_tax" value="{{getAmount($tax->Property_tax)}}" class="form-control mb-3" placeholder="Property Tax" onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
            </div>
            <div class="form-group col-md-3">
                <label for="consolidated_tax"><span class="text-danger">*</span>{{lang('form.consolidated_tax')}}</label>
                <input type="text" name="consolidated_tax" value="{{getAmount($tax->consolidated_tax)}}" class="form-control mb-3" placeholder="Consolidated Tax" onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
            </div>
            <div class="form-group col-md-3">
                <label for="urban_dev_tax"><span class="text-danger">*</span>{{lang('form.urban_development_cess')}}</label>
                <input type="text" name="urben_dev_tax" value="{{getAmount($tax->urban_dev_tax)}}" class="form-control mb-3" placeholder="Urban Development Cess" onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
            </div>
            <div class="form-group col-md-3">
                <label for="education_tax"><span class="text-danger">*</span>{{lang('form.education_cess')}}</label>
                <input type="text" name="education_tax" value="{{getAmount($tax->education_tax)}}" class="form-control mb-3" placeholder="Education Cess" onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
            </div>
            <div class="form-group col-md-3">
                <label for="service_tax"><span class="text-danger">*</span>{{lang('form.service_tax')}}</label>
                <input type="text" name="service_tax" value="{{getAmount($tax->service_tax)}}" class="form-control mb-3" placeholder="Service Tax" onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
            </div>
            <div class="form-group col-md-3">
                <label for="water_tax"><span class="text-danger">*</span>{{lang('form.water_user_charges')}}</label>
                <input type="text" name="water_tax" value="{{getAmount($tax->water_tax)}}" class="form-control mb-3" placeholder="Water User Charges" onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
            </div>
            <div class="form-group col-md-3">
                <label for="garbade_fee"><span class="text-danger">*</span>{{lang('form.garbage_fee')}}</label>
                <input type="text" name="garbade_fee" value="{{getAmount($tax->garbage_tax)}}" class="form-control mb-3" placeholder="Garbage Fee" onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
            </div>
            <div class="form-group col-md-3">
                <label for="rebate"><span class="text-danger">*</span>{{lang('form.rebate')}}</label>
                <input type="text" name="rebate" value="{{getAmount($tax->rebet)}}" class="form-control mb-3" placeholder="Rebate" onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
            </div>
            <div class="form-group col-md-3">
                <label for="surcharge_fee"><span class="text-danger">*</span>{{lang('form.surcharge_fee')}}</label>
                <input type="text" name="surcharge_fee" value="{{getAmount($tax->surcharge_fee)}}" class="form-control mb-3" placeholder="Surcharge Fee" onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
            </div>
            <div class="form-group col-md-3">
                <label for="advance_deposit">{{lang('form.advance_deposit')}}</label>
                <input type="text" value="{{getAmount($tax->advance_deposit)}}" name="advance_deposit" class="form-control mb-3" placeholder="Advance Deposit" >
            </div>
            <div class="form-group col-md-3">
                <label for="total">{{lang('form.total')}}</label>
                <input type="text" name="total" value="{{getAmount($tax->total)}}" class="form-control mb-3" placeholder="Total" >
            </div>
        </div>
        <br><br>
        <button type="submit" class="btn btn-warning">{{lang('form.update')}}</button>
</form>
    @endforeach
@else
    <form action="{{route('resident.currtax.details.save')}}" method="post">
        @csrf
        <div class="row">
            <h3 class="mb-t-b-30">{{lang('form.running_year_taxes')}}</h3>
            <div class="form-group col-md-3">
                <label for="date_from"><span class="text-danger">*</span>{{lang('form.from')}}</label>
                <input class="date_from form-control" id="date_from" name="date_from" style="width: 100%;"
                    type="text">
            </div>
            <div class="form-group col-md-3">
                <label for="date_to"><span class="text-danger">*</span>{{lang('form.to')}} </label><small class="date-error text-danger"></small>
                <input class="date_to form-control" name="date_to" id="date_to" style="width: 100%;" type="text">
            </div>
            <div class="form-group col-md-3">
                <label for="property_tax"><span class="text-danger">*</span>{{lang('form.property_tax')}}</label>
                <input type="text" name="property_tax" class="form-control mb-3" placeholder="Property Tax" onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
            </div>
            <div class="form-group col-md-3">
                <label for="consolidated_tax"><span class="text-danger">*</span>{{lang('form.consolidated_tax')}}</label>
                <input type="text" name="consolidated_tax" class="form-control mb-3" placeholder="Consolidated Tax" onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
            </div>
            <div class="form-group col-md-3">
                <label for="urban_dev_tax"><span class="text-danger">*</span>{{lang('form.urban_development_cess')}}</label>
                <input type="text" name="urben_dev_tax" class="form-control mb-3" placeholder="Urban Development Cess" onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
            </div>
            <div class="form-group col-md-3">
                <label for="education_tax"><span class="text-danger">*</span>{{lang('form.education_cess')}}</label>
                <input type="text" name="education_tax" class="form-control mb-3" placeholder="Education Cess" onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
            </div>
            <div class="form-group col-md-3">
                <label for="service_tax"><span class="text-danger">*</span>{{lang('form.service_tax')}}</label>
                <input type="text" name="service_tax" class="form-control mb-3" placeholder="Service Tax" onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
            </div>
            <div class="form-group col-md-3">
                <label for="water_tax"><span class="text-danger">*</span>{{lang('form.water_user_charges')}}</label>
                <input type="text" name="water_tax" class="form-control mb-3" placeholder="Water User Charges" onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
            </div>
            <div class="form-group col-md-3">
                <label for="garbade_fee"><span class="text-danger">*</span>{{lang('form.garbage_fee')}}</label>
                <input type="text" name="garbade_fee" class="form-control mb-3" placeholder="Garbage Fee" onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
            </div>
            <div class="form-group col-md-3">
                <label for="rebate"><span class="text-danger">*</span>{{lang('form.rebate')}}</label>
                <input type="text" name="rebate" class="form-control mb-3" placeholder="Rebate" onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
            </div>
            <div class="form-group col-md-3">
                <label for="surcharge_fee"><span class="text-danger">*</span>{{lang('form.surcharge_fee')}}</label>
                <input type="text" name="surcharge_fee" class="form-control mb-3" placeholder="Surcharge Fee" onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
            </div>
            <div class="form-group col-md-3">
                <label for="advance_deposit">{{lang('form.advance_deposit')}}</label>
                <input type="text" name="advance_deposit" class="form-control mb-3" placeholder="Advance Deposit" >
            </div>
            <div class="form-group col-md-3">
                <label for="total">{{lang('form.total')}}</label>
                <input type="text" name="total" class="form-control mb-3" placeholder="Total" >
            </div>
        </div>
        <br><br>
        <button type="submit" class="btn btn-warning">{{lang('form.add')}}</button>
    </form>
    @endif

</div>
@endsection

@push('script')
    <script>
          $('.date_from').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true

        });
        $('.date_to').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        });
        let date_from;
        let value;
        $(document).click(function() {
            date_from = $('#date_from').val();
            value = !date_from == '';
            if (value) {
                let date_to = $('#date_to').val();
                if (date_from < date_to) {
                    $('.date-error').text('');
                } else {
                    $('.date-error').text('\'TO\'Date must be greater than \'FROM\'');
                }
            }
        });
    </script>
@endpush
