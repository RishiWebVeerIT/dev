@extends('layouts.master')
@section('page-title', $page_title)
@section('section')
    <div class="pd-60px" id="mainRecieptPrint">
        <div class="text-center">
            <div class="text-center">
                <p class="h3">{{text('Muncipal Corporation Amravati')}}</p>
                <p class="h4">{{text('Property Tax Assessment Department')}}</p>
                <p class="h5">{{lang('reciept.from_date')}} {{text($currentTax->dateFrom)}} {{lang('reciept.to_date')}} {{text($currentTax->dateTo)}}</p>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-sm-6">
                <table class="mainrecieptt">
                    <tr>
                        <td>{{lang('reciept.bill_no')}}</td>
                        <td>: 999999</td>
                    </tr>
                    <tr>
                        <td>{{lang('reciept.bill_date')}}</td>
                        <td>: {{ date('d') }}-{{ date('m') }}-{{ date('y') }}</td>
                    </tr>
                    <tr>
                        <td>{{lang('form.zone')}}/ {{lang('form.ward')}}</td>
                        <td>: {{ text($data->address->zone . ' / ' . $data->address->ward) }}</td>
                    </tr>
                    <tr>
                        <td></td>{{lang('reciept.area')}}
                        <td>: Badkas Square</td>
                    </tr>
                    <tr>
                        <td>{{lang('form.plot_area')}}</td>
                        <td>: {{ $taxdetails->plot_area }}</td>
                    </tr>
                    <tr>
                        <td>{{lang('form.mobile_no')}}</td>
                        <td>: {{ $data->mobile_no }}</td>
                    </tr>
                    <tr>
                        <td>{{lang('reciept.property_owner_name')}}</td>
                        <td>: {{text($data->firstname . ' ' . $data->middlename . ' ' . $data->lastname )}}</td>
                    </tr>
                    <tr>
                        <td>{{lang('form.address')}}</td>
                        <td>: {{ text($data->address->address . ' ' . $data->address->city . ' ' . $data->address->zip) }}</td>
                    </tr>
                </table>
            </div>
            <div class="col-sm-6">
                <table class="mainrecieptt">
                    <tr>
                        <td>{{lang('form.new_property_id')}}</td>
                        <td>: {{ $data->new_property_id }}</td>
                    </tr>
                    <tr>
                        <td>{{lang('form.old_property_id')}}</td>
                        <td>: {{ $data->old_property_id }}</td>
                    </tr>
                    <tr>
                        <td>{{lang('form.uses_factor')}}</td>
                        <td>: {{ $data->uses_factor }}</< /td>
                    </tr>
                    <tr>
                        <td>{{lang('reciept.tax_with_resident')}}</td>
                        <td>: 14000.00</td>
                    </tr>
                    <tr>
                        <td>{{lang('reciept.tax_without_resident')}}</td>
                        <td>: 00.00</td>
                    </tr>
                    <tr>
                        <td>{{lang('form.taxable-property')}}</td>
                        <td>: 14000.00</td>
                    </tr>
                </table>
            </div>
        </div>
        <br><br>
        <div>
            <table class="table table-bordered data-table-show">
                <thead>
                    <tr>
                        <th>{{lang('reciept.tax_details')}}</th>
                        <th>{{lang('reciept.tax_due')}}</th>
                        <th>{{lang('reciept.current_tax')}}</th>
                        <th></th>
                        <th>{{lang('reciept.total_tax')}}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>{{lang('form.property_tax')}}</th>
                        <td>{{ getAmount($otherTax->Property_tax) }}</</td>

                        <td>{{ getAmount($currentTax->Property_tax) }}</</td>
                        <td></td>
                        <td>{{getAmount($Property_Tax_Sum)}}</td>
                    </tr>
                    <tr>
                        <th>{{lang('form.consolidated_tax')}}</th>
                        <td>{{ getAmount($otherTax->consolidated_tax) }}</td>

                        <td>{{ getAmount($currentTax->consolidated_tax) }}</td>
                        <td></td>
                        <td>{{getAmount($consolidated_tax_sum)}}</td>
                    </tr>
                    <tr>
                        <th>{{lang('form.urban_development_cess')}}</th>
                        <td>{{ getAmount($otherTax->urban_dev_tax) }}</td>

                        <td>{{ getAmount($currentTax->urban_dev_tax) }}</td>
                        <td></td>
                        <td>{{getAmount($urban_dev_tax_sum)}}</td>
                    </tr>
                    <tr>
                        <th>{{lang('form.education_cess')}}</th>
                        <td>{{ getAmount($otherTax->education_tax) }}</td>

                        <td>{{ getAmount($currentTax->education_tax) }}</td>
                        <td></td>
                        <td>{{getAmount($education_tax_sum)}}</td>
                    </tr>
                    <tr>
                        <th>{{lang('form.service_tax')}}</th>
                        <td>{{ getAmount($otherTax->service_tax) }}</td>

                        <td>{{ getAmount($currentTax->service_tax) }}</td>
                        <td></td>
                        <td>{{getAmount($service_tax_sum)}}</td>
                    </tr>
                    <tr>
                        <th>{{lang('form.water_user_charges')}}</th>
                        <td>{{ getAmount($otherTax->water_tax) }}</td>

                        <td>{{ getAmount($currentTax->water_tax) }}</td>
                        <td></td>
                        <td>{{getAmount($water_tax_sum)}}</td>
                    </tr>
                    <tr>
                        <th>{{lang('form.garbage_fee')}}</th>
                        <td>{{ getAmount($otherTax->garbage_tax) }}</td>

                        <td>{{ getAmount($currentTax->garbage_tax) }}</td>
                        <td></td>
                        <td>{{getAmount($garbage_tax_sum)}}</td>
                    </tr>
                    <tr>
                        <th>{{lang('form.rebate')}}</th>
                        <td>{{ getAmount($otherTax->rebate) }}</td>
                        <td>{{ getAmount($currentTax->rebate) }}</td>
                        <td></td>
                        <td>{{getAmount($rebate_sum)}}</td>
                    </tr>
                    <tr>
                        <th>{{lang('form.surcharge_fee')}}</th>
                        <td>{{ getAmount($otherTax->surcharge_fee) }}</td>
                        <td>{{ getAmount($currentTax->surcharge_fee) }}</td>
                        <td></td>
                        <td>{{getAmount($surcharge_fee_sum)}}</td>
                    </tr>
                    <tr>
                        <th>{{lang('form.advance_deposit')}}</th>
                        <td>{{ getAmount($otherTax->advance_deposit) }}</td>
                        <td>{{ getAmount($currentTax->advance_deposit) }}</td>
                        <td></td>
                        <td>{{getAmount($advance_deposit_sum)}}</td>
                    </tr>
                    <tr>
                        <th>{{lang('form.total')}}</th>
                        <td>{{ getAmount($otherTax->total) }}</td>
                        <td>{{ getAmount($currentTax->total) }}</td>
                        <td></td>
                        <td>{{getAmount($total_sum)}}</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
    <div class="d-flex">
        <button class="btn btn-warning" onclick="printLAndScapeReciept()">{{lang('form.print')}}</button>
        <a href="{{route('resident.tax.potrait.monthly.reciept',[$data->id, $otherTax->month_from])}}" role="button" class="btn btn-light left-20">Potrait Reciept</a>
        <a href="{{route('resident.tax.monthly.potrait.reciept',[$data->id, $otherTax->month_from])}}" role="button" class="btn btn-light left-20">Main Reciept</a>
    </div>

@endsection

@push('script')
    <script type="text/javascript">
        function printmainReciept() {

            var printContents = document.getElementById("mainRecieptPrint").innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;


        }
    </script>
@endpush

@push('style')
<style>
.mainrecieptt td{
    width: 40%
}
</style>
@endpush
