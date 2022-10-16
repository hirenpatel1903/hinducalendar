<?php use Request as Input; ?>
@section('title','Create Shop')
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
                <a href="{{route('birth.index')}}">Panchang</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span class="active">Create Panchang</span>
            </li>
        </ul>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject font-red-sunglo bold uppercase">Create Panchang</span>
                        </div>
                    </div>
                    @include('errormessage')
                    <div class="portlet-body form">
                        {!! Form::open(['route' => 'birth.store','class'=>'form-horizontal','id'=>'createform','name'=>'createform','enctype'=>'multipart/form-data']) !!}
                            @include('admin.birth_details.common')
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
            start_date: {
                required: true
            },
            to_date: {
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




