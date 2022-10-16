<?php
use Request as Input; ?>
@extends('layouts.app')
@section('title','Forgot Password')
@section('content')

<!-- BEGIN FORGOT PASSWORD FORM -->
{!! Form::open(['route' => array('passwordreset',$token),'class'=>'forget-form show-forgot_form','id'=>'reset_form','name'=>'reset_form','method'=>"POST"]) !!}
    {{ csrf_field() }}
    <h3 class="font-green">Reset Password</h3>
    @include('errormessage')
    <br>
    <div class="form-group">
        {!! Form::text('email',Input::old('email'), ['class' => 'form-control','id'=>"u_email",'maxlength'=>"50","placeholder"=>"Email"]) !!}
    </div>
    <div class="form-group">
        <input id="password" type="password" class="form-control" autocomplete="off" name="password" autocomplete="new-password" placeholder="Password" >
    </div>
    <div class="form-group">
        <input id="password_confirmation" type="password" class="form-control" autocomplete="off" name="password_confirmation" placeholder="Confirm Password">
    </div>
    <div class="form-actions">
        <a href="{{route('login')}}"><button type="button" id="back-btn" class="btn green btn-outline">Back</button></a>
        <button type="submit" class="btn btn-success uppercase pull-right submitbutton">Submit</button>
    </div>
{{ Form::close() }}
<!-- END FORGOT PASSWORD FORM -->
@section('script')
<script>
     $(document).ready(function () {

        $('#reset_form').validate({// initialize the plugin
            rules: {
                email: {
                    required: true,
                    maxlength: 50,
                    email: true,
                },
                password: {
                    required: true,
                    minlength: 5,
                    maxlength: 20,
                },
                password_confirmation: {
                    required: true,
                    minlength: 5,
                    maxlength: 20,
                    equalTo: "#password"
                },
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
