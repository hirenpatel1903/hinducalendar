@extends('layouts.app')
@section('title','Forgot Password')
@section('content')

<!-- BEGIN FORGOT PASSWORD FORM -->
<form method="POST" action="{{ route('resetpasswordemail') }}" class="forget-form show-forgot_form" id="forget-form">
    {{ csrf_field() }}
    <h3 class="font-green">Forget Password ?</h3>
    <p> Enter your e-mail address to reset your password. </p>
    @include('errormessage')
    <div class="form-group">
        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" id="email" /> 
    </div>
    <div class="form-actions">
        <a href="{{route('login')}}"><button type="button" id="back-btn" class="btn green btn-outline">Back</button></a>
        <button type="submit" class="btn btn-success uppercase pull-right submitbutton">Submit</button>
    </div>
</form>
<!-- END FORGOT PASSWORD FORM -->
@section('script')
<script>
    $(document).ready(function () {

        $('#forget-form').validate({
            rules: {
                email: {
                    required: true,
                    maxlength: 50,
                    email: true
                }
            },
            submitHandler: function(form) {                 
                if($("form").validate().checkForm()){                    
                    $(".submitbutton").attr("type","button");
                    $(".submitbutton").addClass("disabled");                    
                    form.submit();
                }         
            }
        });

    });
</script>
@endsection
@endsection
