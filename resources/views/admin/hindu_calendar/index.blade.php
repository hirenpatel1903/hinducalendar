<?php
$status = isset($_GET['status'])?$_GET['status']:'77';
?>
@extends('layouts.master')
@section('title',"Hindu Calendar")
@section('css')
<link href="{{url('assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{url('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
<style>
    .dt-buttons{
        margin-right: 110px;
    }
</style>
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
                <span class="active">Hindu Calendar</span>
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
                            <span class="caption-subject bold uppercase">Panchang</span>
                        </div>
                        <div class="btn-group pull-right">
                            <a href="{{route('hindu-calendar.create')}}"><button id="add_products" class="btn sbold green"> Add New
                                <i class="fa fa-plus"></i>
                            </button></a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover table-responsive" id="recordlist">
                            <thead>
                                <tr>
                                    <th style="width: 55px;">Date</th>
                                    <th>Sunrise</th>
                                    <th>Sunset</th>
                                    <th>Moonrise</th>
                                    <th>Moonset</th>
                                    <th>Vaara</th>
                                    <th>Nakshatra</th>
                                    <th>Tithi</th>
                                    <th>Karana</th>
                                    <th>Yoga</th>
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
        lengthChange: true,
        lengthMenu: getPageLengthDatatable(),
        processing: true,
        serverSide: true,
        order: [],
        scrollX: true,
        scrollY: true,
        searchDelay: 500,
        dom: 'Blfrtip',
        buttons: [
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'Excel',
                className: 'btn sbold green',
            },
        ],
        ajax: {
            url: '{{ route("getcalendar")}}',
            type: 'post',
           data: function (data) {
                data.fromValues = $("#filterData").serialize();
            }
        },
        columns: [
            {data: 'date',
                render: function (data, type, row, meta) {
                     var dateWithTimezone = moment.utc(data).tz(tz);
                     return dateWithTimezone.format('<?php echo config('const.JSPdisplayDateTimeFormatWithAMPM');?>');
                 }
             },
            {data: 'sunrise', name: 'sunrise',defaultContent: "-"},
            {data: 'sunset', name: 'sunset',defaultContent: "-"},
            {data: 'moonrise', name: 'moonrise',defaultContent: "-"},
            {data: 'moonset', name: 'moonset',defaultContent: "-"},
            {data: 'vaara', name: 'vaara',defaultContent: "-"},
            {data: 'nakshatra', name: 'nakshatra',defaultContent: "-"},
            {data: 'tithi', name: 'tithi',defaultContent: "-"},
            {data: 'karana', name: 'karana',defaultContent: "-"},
            {data: 'yoga', name: 'yoga',defaultContent: "-"},
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


    window.history.replaceState({}, document.title,baseUrl+"/admin/hindu-calendar");


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

