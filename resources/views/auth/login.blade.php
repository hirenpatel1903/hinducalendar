@extends('layouts.app')
@section('title','Login')
@section('content')
<form class="login-form" action="{{ url('login') }}" method="post" id="login_form">
    {{ csrf_field() }}
    <h3 class="form-title font-green">Sign In</h3>
    @include('errormessage')
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Email</label>
        <input class="form-control form-control-solid placeholder-no-fix" type="text" id="email" autocomplete="off" placeholder="Email" name="email" /> </div>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Password</label>
        <input class="form-control form-control-solid placeholder-no-fix" type="password" id="password" autocomplete="off" placeholder="Password" name="password" /> </div>
    <div class="form-actions">
        <button type="submit" class="btn green uppercase submitbutton">Login</button>
        <label class="rememberme check mt-checkbox mt-checkbox-outline">
            <!-- <input type="checkbox" name="remember" value="1" />Remember -->
            <!-- <span></span> -->
        </label>
        {{-- <a href="{{route('password.request')}}" id="forget-password" class="forget-password">Forgot Password?</a> --}}
    </div>
</form>
{{-- <p>Click the button below to Panchang Main side</p> --}}
{{-- <a class="note_lbtn" href="{{route('customerhome')}}">panchang.einzigartige.in</a> --}}
@section('script')
<script>
    $(document).ready(function () {
        $('#login_form').validate({
            rules: {
                email: {
                    required: true,
                    maxlength: 50,
                    email: true
                },
                password: {
                    required: true,
                },
            },
            submitHandler: function (form) {
                if ($("form").validate().checkForm()) {
                    $(".submitbutton").attr("type", "button");
                    $(".submitbutton").addClass("disabled");
                    form.submit();
                }
            }
        });

    });
</script>
@endsection
@endsection
