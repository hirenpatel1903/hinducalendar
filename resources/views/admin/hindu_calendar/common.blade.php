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
    <div class="form-group row">
        <label class="col-lg-2 col-form-label">Ayanamsa: <span class="required" aria-required="true">*</span></label>
        <div class="col-lg-4">
            {!! Form::select('ayanamsa',array('1' => 'Lahiri', '3' => 'Raman', '5' => 'KP'),Input::old('ayanamsa'),['class' => 'form-control','id'=>"ayanamsa"]) !!}
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-2 col-form-label">Location:<span class="required" aria-required="true">*</span></label>
        <div class="col-lg-4">
            <select class="form-control" name="location" id="location" required>
                <option disabled selected value="">{{ __('Select Location')}}</option>
                <option value="1">{{ __('Ujjain, Madhya Pradesh, India')}}</option>
                <option value="2">{{ __('Surat, Gujarat, India')}}</option>
            </select>
        </div>
        <input name="coordinates" id="coordinates" type="hidden" value="">
        <a href="">Click here add more location</a>
    </div>
</div>

<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            <button type="submit" class="btn green submitbutton">Submit</button>
            <a href="{{route('hindu-calendar.index')}}"><button type="button" class="btn default cancel">Cancel</button></a>
        </div>
    </div>
</div>
