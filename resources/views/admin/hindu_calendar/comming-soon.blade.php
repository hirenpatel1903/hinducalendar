@extends('front.website.layouts.new_default')

@section('pageTitle', 'Oops Something Went Wrong, 500 Internal Server Error')

@section('pages.new_main_content')
{{-- Div structure start --}}

@section('class', '')

<div class="error_section_main">
	<div class="col-md-12 no_padding absolute_position_div">
		<div class="col-md-6 img_align_right">
			<img src="<?php echo config('constants.CDN_URL_IMAGES') . '500_error.svg'; ?>" alt="500_error">
		</div>
		<div class="col-md-6">
			<h2 class="heading">Something went wrong</h2>
			<p class="desc_txt">An unexpected condition was encountered and no more<br> specific message is suitable as result the server not fulfill an<br> apparently request.</p>
			<div class="theme_btn_div">
            <a class="theme_btn" href="{{ URL::to('/') }}">Visit Home Page</a>
        </div>
		</div>
	</div>
</div>

{{-- Div structure stop --}}
@stop

@section('pages.new_separate_script')

@stop
