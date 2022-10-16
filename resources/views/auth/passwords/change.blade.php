<?php use Request as Input; ?>
@section('title','Change Password')
@extends('layouts.master')

@section('css')
@endsection

@section('content')
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">Dashboard</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span class="active">Change Password</span>
            </li>
        </ul>
        
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject font-red-sunglo bold uppercase">Change Password</span>
                        </div>                                                
                    </div>
                    @include('errormessage')
                    <div class="portlet-body form">
                        {!! Form::open(['route' => 'change.password','class'=>'form-horizontal','id'=>'createform','name'=>'createform','enctype'=>'multipart/form-data']) !!}                                                
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Current Password<span class="required" aria-required="true"> * </span></label>
                                    <div class="col-md-4">                                                               
                                        <input id="currentpassword" type="password" class="form-control" autocomplete="off" name="currentpassword"  placeholder="Current Password" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">New Password<span class="required" aria-required="true"> * </span></label>
                                    <div class="col-md-4">                                                               
                                        <input id="password" type="password" class="form-control" autocomplete="off" name="password" autocomplete="new-password" placeholder="New Password" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Confirm Password<span class="required" aria-required="true"> * </span></label>
                                    <div class="col-md-4">                                                               
                                        <input id="password_confirmation" type="password" class="form-control" autocomplete="off" name="password_confirmation" placeholder="Confirm Password">
                                    </div>
                                </div>
                                
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn green submitbutton">Change</button>         
                                             @if(isset(Auth::user()->role_id) && Auth::user()->role_id==config('const.roleSuperAdmin'))
                                                        <a href="{{route('dashboard')}}"><button type="button" class="btn default cancel">
                                                    @elseif(isset(Auth::user()->role_id) && Auth::user()->role_id==config('const.roleCoffeeShopSuperAdmin'))      
                                                        <a href="{{route('shopdashboard')}}"><button type="button" class="btn default cancel">
                                                    @else
                                                        <a href="{{route('dashboard')}}"><button type="button" class="btn default cancel">
                                                    @endif  
                                            Cancel</button></a>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>     
            </div>
        </div>

        <!-- END PAGE BASE CONTENT -->
    </div>
    <!-- END CONTENT BODY -->
</div>

@endsection

@section('script')
<script type="text/javascript">
    $("#createform").validate({
        ignore: [],
        rules: {
            currentpassword: {
                required: true,
                minlength: 5,
                maxlength: 20,
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
        submitHandler: function (form) {
            if($("form").validate().checkForm()){                    
                $(".submitbutton").attr("type","button");
                $(".submitbutton").addClass("disabled");                    
                form.submit();
            }    
        },
    });

</script>
@endsection




