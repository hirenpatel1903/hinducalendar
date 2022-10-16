<?php
$status = isset($_GET['status'])?$_GET['status']:'77';
?>
@extends('layouts.master')
@section('title',"Panchang")
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
                <span class="active">Panchang</span>
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
                            <a href="{{route('birth.create')}}"><button id="add_products" class="btn sbold green"> Add New
                                <i class="fa fa-plus"></i>
                            </button></a>
                        </div>
                    </div>
                    {{-- <div class="portlet-body tbl_responsive_cls">

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


                    </div> --}}
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover table-responsive" id="recordlist">
                            <thead>
                                <tr>
                                    <th style="width: 55px;">Date</th>
                                    <th style="width: 90px;">Hindu Month</th>
                                    <th style="width: 90px;">Month Planet</th>
                                    <th>Vaar</th>
                                    <th>Paksha</th>
                                    <th>Tithi</th>
                                    <th>Nakshatra</th>
                                    <th>Yog</th>
                                    <th style="width: 90px;">Moon Rashi</th>
                                    <th style="width: 90px;">Rashi Planet</th>
                                    <th style="width: 90px;">Moon Varna</th>
                                    <th style="width: 90px;">Sun Rashi</th>
                                    <th>Karan</th>
                                    <th>Sunrise</th>
                                    <th>Sunset</th>
                                    <th>Aries</th>
                                    <th>Taurus</th>
                                    <th>Gemini</th>
                                    <th>Cancer</th>
                                    <th>Leo</th>
                                    <th>Virgo</th>
                                    <th>Libra</th>
                                    <th>Scorpio</th>
                                    <th>Sagittarius</th>
                                    <th>Capricorn</th>
                                    <th>Aquarius</th>
                                    <th>Pisces</th>
                                    {{-- <th>Action</th> --}}
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
            url: '{{ route("getbirth")}}',
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
            {data: 'hindu_month', name: 'hindu_month',defaultContent: "-"},
            {data: 'month_planet', name: 'month_planet',defaultContent: "-"},
            {data: 'vaar', name: 'vaar',defaultContent: "-"},
            {data: 'paksha', name: 'paksha',defaultContent: "-"},
            {data: 'tithi', name: 'tithi',defaultContent: "-"},
            {data: 'nakshatra', name: 'nakshatra',defaultContent: "-"},
            {data: 'yog', name: 'yog',defaultContent: "-"},
            {data: 'moon_rashi', name: 'moon_rashi',defaultContent: "-"},
            {data: 'rashi_planet', name: 'rashi_planet',defaultContent: "-"},
            {data: 'moon_varna', name: 'moon_varna',defaultContent: "-"},
            {data: 'sun_rashi', name: 'sun_rashi',defaultContent: "-"},
            {data: 'karan', name: 'karan',defaultContent: "-"},
            {data: 'sunrise', name: 'sunrise',defaultContent: "-"},
            {data: 'sunset', name: 'sunset',defaultContent: "-"},
            {data: 'Aries', name: 'Aries',defaultContent: "-"},
            {data: 'Taurus', name: 'Taurus',defaultContent: "-"},
            {data: 'Gemini', name: 'Gemini',defaultContent: "-"},
            {data: 'Cancer', name: 'Cancer',defaultContent: "-"},
            {data: 'Leo', name: 'Leo',defaultContent: "-"},
            {data: 'Virgo', name: 'Virgo',defaultContent: "-"},
            {data: 'Libra', name: 'Libra',defaultContent: "-"},
            {data: 'Scorpio', name: 'Scorpio',defaultContent: "-"},
            {data: 'Sagittarius', name: 'Sagittarius',defaultContent: "-"},
            {data: 'Capricorn', name: 'Capricorn',defaultContent: "-"},
            {data: 'Aquarius', name: 'Aquarius',defaultContent: "-"},
            {data: 'Pisces', name: 'Pisces',defaultContent: "-"},
            // {data: 'action', name: 'action', searchable: false, sortable: false},
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


    window.history.replaceState({}, document.title,baseUrl+"/admin/birth");


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

