<?php use Request as Input; ?>
@section('title','My Profile')
@extends('layouts.master')

@section('css')
<link href="{{url('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />
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
                <span class="active">My Profile</span>
            </li>
        </ul>
         @include('errormessage')
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject font-red-sunglo bold uppercase">My Profile</span>
                        </div>                                                
                    </div>
                   
                    <div class="portlet-body form">
                        {{ Form::model($data, ['route' => ['updatemyprofile'], 'method' => 'post','id'=>'createform','name'=>'createform','class'=>'form-horizontal','enctype'=>'multipart/form-data']) }}                                            
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Name:<span class="required" aria-required="true"> * </span></label>
                                    <div class="col-md-4">                                                               
                                        {!! Form::text('name',Input::old('name'), ['class' => 'form-control','id'=>"name",'name'=>'name','placeholder'=>'Name']) !!} 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Profile :</label>
                                    <div class="col-md-9">    
                                        @if($data->profile_pic)
                                        <img alt="" style="width: 102px;height: 104px;" class="img-circle" src="{{$data->profile_pic}}">
                                        <br><br>
                                        @endif
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <span class="btn green btn-file">
                                                @if($data->profile_pic)
                                                    <span class="fileinput-new"> Change Profile Image </span>
                                                @else
                                                    <span class="fileinput-new"> Select Profile Image </span>
                                                @endif
                                                <span class="fileinput-exists"> Change </span>
                                                <input type="hidden" value="" name="profile_pic"><input type="file" name="profile_pic"> </span>
                                            <span class="fileinput-filename"></span> &nbsp;
                                            <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a>
                                        </div>
                                            
                                    </div>
                                </div>
                                
                                
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn green submitbutton">Update</button>         
                                            
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
<script type="text/javascript" src="{{url('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}"></script>
<script type="text/javascript">
    $("#createform").validate({
        ignore: [],
        rules: {
            name: {
                required: true
            }
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




