<?php use Request as Input; ?>
<div class="form-body">

    <div class="form-group row">
        <label class="col-lg-2 col-form-label">User Id:<span class="required" aria-required="true">*</span></label>
        <div class="col-lg-4">
            {!! Form::text('user_id',Input::old('user_id'), ['class' => 'form-control','id'=>"user_id",'placeholder'=>"User Id"]) !!}
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-2 col-form-label">API Key:<span class="required" aria-required="true">*</span></label>
        <div class="col-lg-4">
            {!! Form::text('api_key',Input::old('api_key'), ['class' => 'form-control','id'=>"api_key",'placeholder'=>"API Key"]) !!}
        </div>
    </div>
</div>

<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            <button type="submit" class="btn green submitbutton">Submit</button>
            <a href="{{route('setting.edit')}}"><button type="button" class="btn default cancel">Cancel</button></a>
        </div>
    </div>
</div>
