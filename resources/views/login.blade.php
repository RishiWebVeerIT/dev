
@extends('layouts.master')
@section('page-title','Login Page')
@section('section')
<div class="login-page">
    <div>
        <div class="d-flex justify-content-center align-item-center">
            <img src="images/AMC_Logo.png" alt="" srcset="">
        </div>
        <div class="form">
            <form class="login-form " action="{{ route('check_login') }}">
                <h3 class="text-center">{{lang('login.login')}}</h3>
                <input type="text" name="email" required placeholder={{lang('login.username')}} id="user" autocomplete="off" />
                <input oninput="return formvalid()" type="password" name="password" required placeholder={{lang('login.password')}} id="pass" autocomplete="off" />
                <img src="https://cdn2.iconfinder.com/data/icons/basic-ui-interface-v-2/32/hide-512.png"
                    onclick="show()" id="showimg">
                <span id="vaild-pass"></span>
                <button type="submit">{{lang('login.login-button')}}</button>
                {{-- <p class="message"><a href="#">Forgot your password?</a></p> --}}
            </form>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    function formvalid() {
  var vaildpass = document.getElementById("pass").value;

  if (vaildpass.length <= 6 || vaildpass.length >= 20) {
    document.getElementById("vaild-pass").innerHTML = "Minimum 6 characters";
    return false;
  } else {
    document.getElementById("vaild-pass").innerHTML = "";
  }
}

function show() {
  var x = document.getElementById("pass");
  if (x.type === "password") {
    x.type = "text";
    document.getElementById("showimg").src =
      "https://static.thenounproject.com/png/777494-200.png";
  } else {
    x.type = "password";
    document.getElementById("showimg").src =
      "https://cdn2.iconfinder.com/data/icons/basic-ui-interface-v-2/32/hide-512.png";
  }
}

</script>

@endpush
