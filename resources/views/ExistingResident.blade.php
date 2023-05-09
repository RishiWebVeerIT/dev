@extends('layouts.master')
@section('page-title',$page_title)
@section('section')
<div class="form-group bg-light pd-60px row justify-content-center align-items-center">
    <select class="form-control width-50" id="SelExample" >
        <option value="0">{{lang('form.select')}}</option>
      @forelse ($data as $item)
        <option value="{{$item->id}}">{{$item->firstname.' '.$item->middlename.' '.$item->lastname}}</option>
      @empty
      <option value="0">{{lang('No_Record_Found')}}</option>
      @endforelse
      </select>
<br>
      <a data-href="{{ route('resident.tax.details', $item->id) }}" role="button" id="but_read" class="btn btn-secondary width-51" style="display:none; margin-top:30px">{{lang('form.go_to_resident')}}</a>
    <span id="result"></span>

</div>

@endsection
@push('script')
<script>
    $(document).ready(function(){

// Initialize select2
// $("#SelExample").select();
// $("#SelExample").select("val", "4");
// $('#SelExample option:selected').text('Vizag');
// Read selected option
var username;
    var userid;
$('#SelExample').click(function(){
    username = $('#SelExample option:selected').text();
    userid = $('#SelExample').val();
    $('#result').text("");
  if(userid > 0){
    $('#but_read').show();
  }else{
    $('#but_read').hide();
  }
});
$('#but_read').click(function(){
  window.location.href = $(this).data('href');
});
});
</script>
@endpush
