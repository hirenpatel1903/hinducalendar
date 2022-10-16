<?php
use Request as Input; ?>
@section('title','View User Details')
@extends('layouts.master')

@section('css')
<link href="{{url('assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        @include('errormessage')
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">Dashboard</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{route('user.index')}}">Users</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span class="active">View User Details</span>
            </li>
        </ul>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">                                
                    <div class="portlet-title">
                        <div class="caption">                                        
                            <span class="caption-subject font-red-sunglo bold uppercase">View User Details</span>
                        </div>                                                
                    </div>
                    <div class="row static-info">
                        <div class="col-md-2 value">Name:</div>
                        <div class="col-md-4 name">{{$data->name}}</div>
                        <div class="col-md-2 value">Status:</div>
                        <div class="col-md-4 name">@if($data->status==1)<button type="button" class="btn green btn-xs pointerhide">Active</button> @else <button type="button" class="btn red btn-xs pointerhide">InActive</button> @endif</div>
                    </div>
                    <div class="row static-info">
                        <div class="col-md-2 value">Email:</div>
                        <div class="col-md-4 name">{{$data->email}}</div>
                        <div class="col-md-2 value">Profile:</div>
                        <div class="col-md-4 name">
                        @if($data->profile_pic)
                            <img alt="" style="width: 50px;height: 50px;" class="img-circle" src="{{$data->profile_pic}}">
                        @endif
                        </div>
                    </div>
                   
                   
                </div>     
            </div>
        </div> 
        
    </div>
</div>
@endsection

@section('script')

@endsection




