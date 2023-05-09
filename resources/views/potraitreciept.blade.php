@extends('layouts.master')
@section('page-title',$page_title)
@section('section')
<div class="pd-60px" id="PotraitRecieptPrin">
    <div class="d-flex justify-content-between">
        <div></div>
        <div class="text-center">
            <p>Amravati Nagar Palika / अमरावती नगर पालिका</p>
            <p>{{lang('reciept.reciept')}}</p>
        </div>
        <div class="text-center">
            <p>{{lang('reciept.customer_copy')}}</p>
        </div>
    </div>
    <div>
        <p>{{lang('reciept.pin')}}/ {{lang('reciept.service_number')}}/ {{lang('reciept.regestration_number')}}: 1000000'</p>
        <p>{{lang('reciept.mode')}} - {{lang('reciept.cash')}}/{{lang('reciept.online')}}</p>
        <p>{{lang('reciept.mr_mrs')}} :{{text($data->firstname.' '.$data->middlename.' '.$data->lastname)}}</p>
        <p>{{lang('form.address')}} :{{text($data->address->address.' '.$data->address->city.' '.$data->address->zip)}}</p>
        <p>{{lang('reciept.total_amount')}} : 4000.00 &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; {{lang('reciept.other_information')}} : 2500.00 + 1500.00 = 4000.00 </p>
        <p>{{lang('reciept.reciept_type')}}  : AA/BB/CC</p>
        <p>{{lang('reciept.previous_total')}}  : 00.00 &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;{{lang('reciept.current_total')}}  : 4000.00</p>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; GST : 00.00
        <br><br>
        <div class="d-flex justify-content-between">
            <div class="text-center"><p>{{lang('reciept.user')}} </p></div>
            <div class="text-center"><p>{{lang('reciept.counter_number')}} </p></div>
            <div class="text-center"><p>{{lang('reciept.reciever_signature')}} </p></div>
        </div>
    </div>
</div>
<div class="d-flex">
    <button class="btn btn-warning" onclick="printPotraitReciept()">{{lang('form.print')}} </button>
    <a href="{{route('resident.tax.potrait.reciept',$data->id)}}" role="banner" class="btn btn-light left-20">Potrait Reciept</a>
    <a href="{{route('resident.tax.main.reciept',$data->id)}}" role="banner" class="btn btn-light left-20">Main Reciept</a>
</div>
@endsection

@push('script')
    <script type="text/javascript">
        function printPotraitReciept() {

            var printContents = document.getElementById("PotraitRecieptPrint").innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;


        }
    </script>
@endpush
