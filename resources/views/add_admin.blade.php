@extends('layouts.master')
@section('page-title','Add Admin')
@section('section')
<div class="bg-light pd-60px">
    <h3 class="mb-t-b-30">Add Admin</h3>
<form action="{{ route('create_admin') }}" method="post">
    @csrf
    <div class="row">
      <div class="form-group col-md-6">
        <label for="first_name"><span class="text-danger">*</span>First Name : </label>
        <input type="text" name="first_name" class="form-control mb-3" placeholder="First Name" required>
      </div>
      <div class="form-group col-md-6">
        <label for="middle_name"><span class="text-danger">*</span>Middle Name : </label>
        <input type="text" name="middle_name" class="form-control mb-3" placeholder="Middle Name" required>
      </div>
      <div class="form-group col-md-6">
        <label for="last_name"><span class="text-danger">*</span>Last Name : </label>
        <input type="test" name="last_name" class="form-control mb-3"  placeholder="Last Name" required>
      </div>
      <div class="form-group col-md-6">
        <label for="First-password"><span class="text-danger">*</span>Email ID : </label>
        <input type="email" name="email" class="form-control mb-3"  placeholder="Email" required>
      </div>


      <div class="col-md-6">
        <div class="form-group">
            <label for="First-password"><span class="text-danger">*</span>Password : </label>
            <div class="input-group">
                <input type="password" name="prepassword" id="password" class="form-control mb-3"  placeholder="Password" required>
                <div class="input-group-append">
                    <div id="showPass" class="input-group-text">
                        <i class="fa fa-eye-slash" aria-hidden="true"></i>
                        <i class="fa fa-eye" aria-hidden="true" style="display:none;"></i>
                    </div>
                </div>
            </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
            <label for="password"><span class="text-danger">*</span>Confirm Password : </label>
            <span class="error text-danger"></span>
            <div class="input-group">
                <input type="password" id="confirm_password" name="password" class="form-control mb-3"  placeholder="Confirm Password" required>
                <div class="input-group-append">
                    <div id="showPass2" class="input-group-text">
                        <i class="fa fa-eye-slash" aria-hidden="true"></i>
                        <i class="fa fa-eye" aria-hidden="true" style="display:none;"></i>
                    </div>
                </div>
            </div>
        </div>
      </div>

    </div>
    <button type="submit" class="btn btn-warning add-btn" disabled>Add Admin</button>
  </form>
</div>
@endsection
@push('script')
    <script>
        (function ($) {
            "use strict";
            // Bid
            $(document).on("keyup", "#confirm_password", function () {
                var pass = $("#password").val();
                var C_pass = $(this).val();
                if (C_pass != pass || pass == '' || C_pass == ''){
                    $('.error').text(' (Password didn\'t match)');
                }else if(C_pass == pass || pass != '' || C_pass != ''){
                    $('.error').text('');
                    $(".add-btn").removeAttr("disabled");
                }
            });

        })(jQuery);

        $(document).ready(function() {
  $("#showPass").click(function() {
    if ($("#password").attr("type") == "password") {
      $("#password").attr("type", "text");
    } else {
      $("#password").attr("type", "password");
    }
  });
  $("#showPass").click(function() {
    $("#showPass i").toggle();
  });
});

$(document).ready(function() {
  $("#showPass2").click(function() {
    if ($("#confirm_password").attr("type") == "password") {
      $("#confirm_password").attr("type", "text");
    } else {
      $("#confirm_password").attr("type", "password");
    }
  });
  $("#showPass2").click(function() {
    $("#showPass2 i").toggle();
  });
});
    </script>
@endpush
@push('style')
<style>
#showPass, #showPass2 {
  display:inline-block;
  cursor: pointer;
}
</style>
@endpush
