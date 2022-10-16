<?php use Request as Input; ?>
<div class="form-body">
    
    <div class="form-group row">
        <label class="col-lg-2 col-form-label">Name:<span class="required" aria-required="true">*</span></label>
        <div class="col-lg-4">
            {!! Form::text('name',Input::old('name'), ['class' => 'form-control','id'=>"name",'placeholder'=>"Shop Name"]) !!}
        </div>
        <label class="col-lg-2 col-form-label">Email:</label>
        <div class="col-lg-4">
            {{$data->email}}
        </div>
    </div>
    
    @if(isset($data->id))
    <div class="form-group row">
        <label class="col-lg-2 col-form-label">Status: <span class="required" aria-required="true">*</span></label>
        <div class="col-lg-4">
            {!! Form::select('status',array('1' => 'Active', '0' => 'InActive'),Input::old('status'),['class' => 'form-control','id'=>"status"]) !!}
        </div>
    </div>
    @else
        <input type="hidden" name="status" value="1"/>
    @endif
</div>

<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            <button type="submit" class="btn green submitbutton">Submit</button>         
            <a href="{{route('user.index')}}"><button type="button" class="btn default cancel">Cancel</button></a>
        </div>
    </div>
</div>