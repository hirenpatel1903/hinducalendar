<?php use Request as Input; ?>
@section('title','Edit User')
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
                <a href="{{route('user.index')}}">Settings</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span class="active">Edit Setting</span>
            </li>
        </ul>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject font-red-sunglo bold uppercase">Edit Setting</span>
                        </div>
                    </div>
                    @include('errormessage')
                    <div class="portlet-body form">
                        {{ Form::model($data, ['route' => ['setting.update'], 'method' => 'post','id'=>'createform','name'=>'createform','class'=>'form-horizontal']) }}
                            @include('admin.setting.common')
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
            user_id: {
                required: true
            },
            api_key: {
                required: true
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




