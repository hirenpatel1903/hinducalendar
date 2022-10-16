<?php
$status = isset($_GET['status'])?$_GET['status']:'77';
?>
@extends('layouts.master')
@section('title',"Users")
@section('css')
<link href="{{url('assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{url('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
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
                <span class="active">Users</span>
            </li>
        </ul>

        <!-- BEGIN PAGE BASE CONTENT -->
        @include('errormessage')
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <span class="caption-subject bold uppercase">Users</span>
                        </div>
                        <div class="btn-group pull-right">
                        </div>
                    </div>
                    <div class="portlet-body tbl_responsive_cls">

                        <div class="col-md-12">
                            <!-- boxless -->
                            <!-- box blue-hoki -->
                            <div class="portlet boxless">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-search"></i>Search</div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body form" style="display: block;">
                                    <!-- Search From Starts Here -->
                                    <form method="POST" action="" accept-charset="UTF-8" class="form-horizontal" id="filterData" name="filterData" novalidate="novalidate">

                                        <div class="form-body">

                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label">Role:</label>
                                                <div class="col-lg-3">
                                                    <select class="form-control" name="searchByRole" id="searchByRole">
                                                        <option value="">-- Select Role --</option>
                                                        @if($roles)
                                                            @foreach($roles as $key=>$rolesData)
                                                                <option value="{{$key}}">{{$rolesData}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                                <label class="col-lg-2 col-form-label">Status:</label>
                                                <div class="col-lg-3">
                                                    <select class="form-control" name="searchByStatus" id="searchByStatus">
                                                        <option value="">-- Select Status --</option>
                                                        <option value="{{config('const.statusActive')}} " <?php if($status==config('const.statusActive')){ echo "selected";} ?>>Active</option>
                                                        <option value="{{config('const.statusInActive')}}" <?php if($status==config('const.statusInActive')){ echo "selected";} ?> >Inactive</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="form-actions fluid">
                                            <div class="row">
                                                <div class="col-md-offset-5">
                                                    <button type="submit" class="btn green">Search</button>
                                                    <button type="button" class="btn default clearform">Clear</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover table-responsive" id="recordlist">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>

                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
        <!-- END PAGE BASE CONTENT -->
    </div>
    <!-- END CONTENT BODY-->
    @include('confirmalert')
</div>
@endsection

@section('script')
<script src="{{url('assets/global/scripts/datatable.js')}}" type="text/javascript"></script>
<script src="{{url('assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{url('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
<script src="{{url('assets/pages/scripts/table-datatables-managed.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function () {
    var dataTable = $('#recordlist').DataTable({
        lengthMenu: getPageLengthDatatable(),
        processing: true,
        serverSide: true,
        order: [],
        searchDelay: 500,
        ajax: {
            url: '{{ route("getusers")}}',
            type: 'post',
           data: function (data) {
                data.fromValues = $("#filterData").serialize();
            }
        },
        columns: [
            {data: 'name', name: 'users.name'},
            {data: 'email', name: 'email'},
            {data: 'role_name', name: 'role.name'},
            {data: 'created_at',
                render: function (data, type, row, meta) {
                     var dateWithTimezone = moment.utc(data).tz(tz);
                     return dateWithTimezone.format('<?php echo config('const.JSdisplayDateTimeFormatWithAMPM');?>');
                 }
             },
            {data: 'status', name: 'users.status'},
            {data: 'action', name: 'action', searchable: false, sortable: false},
        ]
    });


    $(".clearform").bind("click", function () {
        $('#filterData')[0].reset();
        $("#searchByRole").val('');
        $("#searchByStatus").val('');
        dataTable.draw();
    });

    $("#filterData").submit(function (event) {
        event.preventDefault();
        dataTable.draw();
    });


    window.history.replaceState({}, document.title,baseUrl+"/admin/user");


    $("#delete-record").on("click", function () {
        var id = $("#id").val();
        $('#exampleModal').modal('hide');
        $.ajax({
            url: baseUrl + '/admin/user/' + id,
            type: "DELETE",
            dataType: 'json',
            success: function (data) {
                if (data == 'Error') {
                    toastr.error("@lang('messages.somethingWrong')");
                } else {
                    toastr.success("@lang('messages.recordDelete')");
                    dataTable.draw();
                }
            },
            error: function (data) {
                toastr.error("@lang('messages.oopserror')", "@lang('messages.error')");
            }
        });
    });


});
</script>
@endsection

