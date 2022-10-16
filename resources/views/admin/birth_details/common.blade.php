<?php use Request as Input; ?>
<div class="form-body">

    <div class="form-group row">
        <label class="col-lg-2 col-form-label">From Date:<span class="required" aria-required="true">*</span></label>
        <div class="col-lg-4">
            {!! Form::date('start_date',Input::old('start_date'), ['class' => 'form-control','id'=>"start_date"]) !!}
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-2 col-form-label">To Date:<span class="required" aria-required="true">*</span></label>
        <div class="col-lg-4">
            {!! Form::date('to_date',Input::old('to_date'), ['class' => 'form-control','id'=>"to_date"]) !!}
        </div>
    </div>
</div>

<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            <button type="submit" class="btn green submitbutton">Submit</button>
            <a href="{{route('birth.index')}}"><button type="button" class="btn default cancel">Cancel</button></a>
        </div>
    </div>
</div>
