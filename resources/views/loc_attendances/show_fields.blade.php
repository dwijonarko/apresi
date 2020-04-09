<!-- User Id Field -->
<div class="form-group row">
    {!! Form::label('user_id', 'User Id',['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-6">
    <p>: {{ $locAttendance->user->name }}</p>
    </div>
</div>

<!-- Latitude Field -->
<div class="form-group row">
    {!! Form::label('latitude', 'Latitude',['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-6">
    <p>: {{ $locAttendance->latitude }}</p>
    </div>
</div>

<!-- Longitude Field -->
<div class="form-group row">
    {!! Form::label('longitude', 'Longitude',['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-6">
    <p>: {{ $locAttendance->longitude }}</p>
    </div>
</div>

<!-- Type Field -->
<div class="form-group row">
    {!! Form::label('type', 'Type',['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-6">
    <p>: {{ $locAttendance->type }}</p>
    </div>
</div>
<div class="form-group row">
    {!! Form::label('attachments', 'Attachments',['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-4">
    <img src="{{asset($locAttendance->image_front)}}" class="img img-responsive" style="width:300px" />
    </div>
    <div class="col-sm-4">
    <img src="{{asset($locAttendance->image_back)}}" class="img img-responsive" style="width:300px" />
    </div>
</div>
<div class="form-group row">
    <div id="mapid" style="height:400px;width:600px;margin:0 10px"></div>
</div> 
