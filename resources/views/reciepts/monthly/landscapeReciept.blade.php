@extends('layouts.master')
@section('page-title', $page_title)
@section('section')
    <div class="pd-60px" id="RecieptPrint">
        <div class="d-flex justify-content-between">
            <div>
                <p>{{text('Muncipal Act 19 Sect 00')}}</p>
                <p>{{lang('reciept.reciept_no')}} : 0000-000-0000</p>
                <p>{{lang('form.old_property_id')}} : {{ $data->old_property_id }}</p>
            </div>
            <div class="text-center">
                <p>{{lang('reciept.reciept')}}</p>
                <p>{{lang('reciept.amravati_municipality')}}</p>
                <p>{{lang('form.property_tax')}}</p>
            </div>
            <div>
                <p>{{lang('reciept.consumer_reciept')}}</p>
                <p>{{lang('reciept.date')}}: {{date('d');}}-{{date('m');}}-{{date('y');}}</p>
                <p>{{lang('reciept.determination_year')}} 2023-24</p>
            </div>
        </div>
        <div>
            <p>{{lang('form.old_property_id')}} : {{ $data->old_property_id }}</p>
            <p>{{lang('reciept.property_owner_name')}} : {{ text($data->firstname . ' ' . $data->middlename . ' ' . $data->lastname) }}</p>
            <div class="d-flex justify-content-between">
            <p>{{lang('form.address')}}
                :{{ text($data->address->address . ' ' . $data->address->city . ' ' . $data->address->zip )}}</p>
               <p>{{lang('form.zone')}} / {{lang('form.ward')}} --{{ $data->address->zone . ' / ' . $data->address->ward }}</p>
                <p>{{lang('reciept.region_no')}}-{{$data->address->ward }}</p>
            </div>

            <p>{{lang('form.plot_area')}}:{{ $taxdetails[0]->plot_area }}</p>
        </div>
        <p>{{lang('reciept.info_msg_top')}}</p>

        <table class="table table-bordered data-table-show table-hover">
            <thead>
                <tr>
                    <th scope="col">{{lang('form.plot_area')}}</th>
                    <th scope="col">{{lang('form.types_of_property')}}</th>
                    <th scope="col">{{lang('form.uses_factor')}}</th>
                    <th scope="col">{{lang('form.floor')}}</th>
                    <th scope="col">{{lang('form.type_of_construction')}}</th>
                    <th scope="col">{{lang('form.constructed_area')}}</th>
                    <th scope="col">{{lang('form.rate')}}</th>
                    <th scope="col">{{lang('form.value')}}</th>
                    <th scope="col">{{lang('form.discount')}} 10%</th>
                    <th scope="col">{{lang('form.taxable-property')}}</th>
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

                </tr>
                @empty
                <td>No Record Found</td>
                @endforelse

            </tbody>
        </table>
        <br><br>
        <table class="table table-bordered data-table-show table-hover">
            <thead>
                <tr>
                    <th scope="col">{{lang('form.month')}}</th>
                    <th scope="col">{{lang('form.property_tax')}}</th>
                    <th scope="col">{{lang('form.consolidated_tax')}}</th>
                    <th scope="col">{{lang('form.urban_development_cess')}}</th>
                    <th scope="col">{{lang('form.education_cess')}}</th>
                    <th scope="col">{{lang('form.service_tax')}}</th>
                    <th scope="col">{{lang('form.water_user_charges')}}</th>
                    <th scope="col">{{lang('form.garbage_fee')}}</th>
                    <th scope="col">{{lang('form.rebate')}}</th>
                    <th scope="col">{{lang('form.surcharge_fee')}}</th>
                    <th scope="col">{{lang('form.advance_deposit')}}</th>
                    <th scope="col">{{lang('form.total')}}</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($otherTax as $otdetails)
                <?php
                $monthFrom = DateTime::createFromFormat('!m', $otdetails->month_from);
                $monthTo = DateTime::createFromFormat('!m', $otdetails->month_to);
                ?>
                    <tr>
                        <th scope="row">{{$monthFrom->format('F').'-'.$monthTo->format('F')}}</th>
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

                </tr>
                @empty
                <td>No Record Found</td>
                @endforelse
                <tr>
                    <th scope="row">{{getYr($currentTax->dateFrom).'-'.getYr($currentTax->dateTo)}}</th>
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

                </tr>
                <tr>
                    <th scope="row">{{lang('form.total')}}</th>
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

                </tr>
            </tbody>
        </table>
        <br><br>
        <div class="d-flex justify-content-between">
            <div>
                <p>{{lang('reciept.paid_amount')}} - 37116.00</p>
                <p>{{lang('reciept.current_total')}} - 1544.00</p>
                <p>{{lang('reciept.total_deposit_amount')}} - 37116.00</p>
                <p>{{lang('reciept.comment')}} - 1997-1998 to 2022-23</p>
            </div>
            <div>
                <p>{{lang('reciept.date')}} - 01-02-2023</p>
                <p>{{lang('reciept.outstanding_total')}} - 35572.00</p>
                <div></div>
                <p>{{lang('reciept.total_ask')}} - 37116.00</p>
            </div>
            <div>
                <p>{{lang('reciept.type_of_payment')}} - {{lang('reciept.cash')}}/{{lang('reciept.online')}}</p>
                <p>{{lang('reciept.total_discount')}}- 0.00</p>
                <div></div>
                <p>{{lang('reciept.payment')}} - 37116.00 {{lang('reciept.remainder')}}- 00.00</p>
            </div>
            <div>
                <div></div>
                <div></div>
                <div></div>
                <p>
                <p>{{lang('reciept.info_msg_bottom')}}</p>
            </div>
        </div>
    </div>
    <div class="d-flex">
        <button class="btn btn-warning" onclick="printLAndScapeReciept()">{{lang('form.print')}}</button>
        <a href="{{route('resident.tax.potrait.monthly.reciept',[$data->id, $otdetails->month_from])}}" role="banner" class="btn btn-light left-20">Potrait Reciept</a>
        <a href="{{route('resident.tax.monthly.potrait.reciept',[$data->id, $otdetails->month_from])}}" role="banner" class="btn btn-light left-20">Main Reciept</a>
    </div>
@endsection
{{-- @section('nav_bredcrumb')
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Reciept Type
        </a>
        <select class="dropdown-menu changeReciept" aria-labelledby="navbarDropdown">
            <option class="dropdown-item" data-href="{{ route('resident.tax.landscape.reciept', $data->id) }}">Property Tax
            </option>
            <option class="dropdown-item" data-href="{{ route('resident.tax.potrait.reciept', $data->id) }}">Customer
                Reciept</option>
            <option class="dropdown-item" data-href="#">Main Reciept</option>
        </select>
    </li>
@endsection --}}

@push('script')
    <script type="text/javascript">
        function printLAndScapeReciept() {

            var printContents = document.getElementById("RecieptPrint").innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;


        }
    </script>
@endpush
