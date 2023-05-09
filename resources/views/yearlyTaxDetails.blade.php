@extends('layouts.master')
@section('page-title', $page_title)
@section('section')
<div class="border border-dark pd-60px mt-20">
    <h3 class="mb-t-b-30">Details</h3>
    <table class="table table-bordered data-table-show table-hover">
        <thead>
            <tr>
                <th scope="col">{{ lang('form.plot_area') }}</th>
                <th scope="col">{{ lang('form.types_of_property') }}</th>
                <th scope="col">{{ lang('form.uses_factor') }}</th>
                <th scope="col">{{ lang('form.floor') }}</th>
                <th scope="col">{{ lang('form.type_of_construction') }}</th>
                <th scope="col">{{ lang('form.constructed_area') }}</th>
                <th scope="col">{{ lang('form.rate') }}</th>
                <th scope="col">{{ lang('form.value') }}</th>
                <th scope="col">{{ lang('form.discount') }} 10%</th>
                <th scope="col">{{ lang('form.taxable-property') }}</th>
                <th scope="col">{{ lang('form.edit') }}</th>
                <th scope="col">{{ lang('form.delete') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($taxdetails as $tdetails)
                <tr>
                    <td scope="row">{{ $tdetails->plot_area }}</td>
                    <td>{{ $tdetails->property_type }}</td>
                    <td>{{ $tdetails->uses_factor }}</td>
                    <td>{{ $tdetails->floor }}</td>
                    <td>{{ text($tdetails->construction_type) }}</td>
                    <td>{{ $tdetails->constructed_area }}</td>
                    <td>{{ getAmount($tdetails->rate) }}</td>
                    <td>{{ getAmount($tdetails->value) }}</td>
                    <td>{{ getAmount($tdetails->dicount) }}</td>
                    <td>{{ getAmount($tdetails->taxable_property) }}</td>
                    <td><a href="#"><i class="las la-pen"></i></a></td>
                    <td><a href="#"><i class="las la-trash"></i></a></td>
                </tr>
            @empty
                <div class="text-center">No Record Found</div>
            @endforelse

        </tbody>
    </table>
    <br><br>
    <table class="table table-bordered data-table-show table-hover">
        <thead>
            <tr>
                <th scope="col">{{ lang('form.year') }}</th>
                <th scope="col">{{ lang('form.property_tax') }}</th>
                <th scope="col">{{ lang('form.consolidated_tax') }}</th>
                <th scope="col">{{ lang('form.urban_development_cess') }}</th>
                <th scope="col">{{ lang('form.education_cess') }}</th>
                <th scope="col">{{ lang('form.service_tax') }}</th>
                <th scope="col">{{ lang('form.water_user_charges') }}</th>
                <th scope="col">{{ lang('form.garbage_fee') }}</th>
                <th scope="col">{{ lang('form.rebate') }}</th>
                <th scope="col">{{ lang('form.surcharge_fee') }}</th>
                <th scope="col">{{ lang('form.advance_deposit') }}</th>
                <th scope="col">{{ lang('form.total') }}</th>
                <th scope="col">{{ lang('form.edit') }}</th>
                <th scope="col">{{ lang('form.delete') }}</th>
                <th scope="col">{{ lang('reciept.reciept') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($otherTax as $otdetails)
                <tr>
                    <th scope="row">{{ $otdetails->year }}</th>
                    <td>{{ getAmount($otdetails->Property_tax) }}</td>
                    <td>{{ getAmount($otdetails->consolidated_tax) }}</td>
                    <td>{{ getAmount($otdetails->urban_dev_tax) }}</td>
                    <td>{{ getAmount($otdetails->education_tax) }}</td>
                    <td>{{ getAmount($otdetails->service_tax) }}</td>
                    <td>{{ getAmount($otdetails->water_tax) }}</td>
                    <td>{{ getAmount($otdetails->garbage_tax) }}</td>
                    <td>{{ getAmount($otdetails->rebate) }}</td>
                    <td>{{ getAmount($otdetails->surcharge_fee) }}</td>
                    <td>{{ getAmount($otdetails->advance_deposit) }}</td>
                    <td>{{ getAmount($otdetails->total) }}</td>
                    <td><a href="#"><i class="las la-pen"></i></a></td>
                    <td><a href="#"><i class="las la-trash"></i></a></td>
                    <td><a href="{{route('resident.tax.yearly.landscape.reciept',[$otdetails->resident_id , $otdetails->year])}}"><i class="lar la-file-alt"></i></a></td>
                </tr>
            @empty

                <div class="text-center">No Record Found</div>
            @endforelse
            <tr>
                <th scope="row">{{ getYr($currentTax->dateFrom) . '-' . getYr($currentTax->dateTo) }}</th>
                <td>{{ getAmount($currentTax->Property_tax) }}</td>
                <td>{{ getAmount($currentTax->consolidated_tax) }}</td>
                <td>{{ getAmount($currentTax->urban_dev_tax) }}</td>
                <td>{{ getAmount($currentTax->education_tax) }}</td>
                <td>{{ getAmount($currentTax->service_tax) }}</td>
                <td>{{ getAmount($currentTax->water_tax) }}</td>
                <td>{{ getAmount($currentTax->garbage_tax) }}</td>
                <td>{{ getAmount($currentTax->rebate) }}</td>
                <td>{{ getAmount($currentTax->surcharge_fee) }}</td>
                <td>{{ getAmount($currentTax->advance_deposit) }}</td>
                <td>{{ getAmount($currentTax->total) }}</td>
                <td>-</td>
                <td>-</td>
            </tr>
            <tr>
                <th scope="row">{{ lang('form.total') }}</th>
                <td>{{ getAmount($Property_Tax_Sum) }}</td>
                <td>{{ getAmount($consolidated_tax_sum) }}</td>
                <td>{{ getAmount($urban_dev_tax_sum) }}</td>
                <td>{{ getAmount($education_tax_sum) }}</td>
                <td>{{ getAmount($service_tax_sum) }}</td>
                <td>{{ getAmount($water_tax_sum) }}</td>
                <td>{{ getAmount($garbage_tax_sum) }}</td>
                <td>{{ getAmount($rebate_sum) }}</td>
                <td>{{ getAmount($surcharge_fee_sum) }}</td>
                <td>{{ getAmount($advance_deposit_sum) }}</td>
                <td>{{ getAmount($total_sum) }}</td>
                <td>-</td>
                <td>-</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
