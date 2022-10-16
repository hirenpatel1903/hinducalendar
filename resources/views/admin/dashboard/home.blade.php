@extends('layouts.master')
@section('title','Dashboard')
@section('content')
<div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <!-- BEGIN PAGE TITLE -->
                       
                    </div>
                    <!-- END PAGE HEAD-->
                    <!-- BEGIN PAGE BREADCRUMB -->
                    <ul class="page-breadcrumb breadcrumb">
                        <li>
                            <span class="active">Dashboard</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row">
                        <!-- <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a href="#">
                                <div class="dashboard-stat2 bordered">
                                    <div class="display">
                                        <div class="number">
                                            <h3 class="font-green-sharp">
                                                <span data-counter="counterup" data-value="0"></span>
                                            </h3>
                                            <small>TOTAL Selling Product</small>
                                        </div>
                                        <div class="icon">
                                            <i class="icon-puzzle"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div> -->
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                             <a href="{{ URL::to('/admin/user').'?status=1' }}">
                                <div class="dashboard-stat2 bordered">
                                    <div class="display">
                                        <div class="number">
                                            <h3 class="font-red-haze">
                                                <span data-counter="counterup" data-value="{{$data->total_active_users}}">{{$data->total_active_users}}</span>
                                            </h3>
                                            <small>Total Active Users</small>
                                        </div>
                                        <div class="icon">
                                            <i class="icon-users"></i>
                                        </div>
                                    </div>
                                </div>
                             </a>    
                        </div>
                        
                    </div>


                    <!-- END PAGE BASE CONTENT -->
                </div>
                <!-- END CONTENT BODY -->
            </div>
@endsection
