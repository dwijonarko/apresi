<div class="row">
	<div class="col-sm-4" style="padding: 20px ">
		<img src="{!! $user->avatar !!}" alt="{!! $user->name !!}" style="width: 200px" class="img img-responsive ">
	</div>
	<div class="col-sm-6">
		<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', 'Name',['class'=>'control-label col-sm-2']) !!}
    <div class="col-sm-4">
    <p>: {!! $user->name !!}</p>
    </div>
</div>

<!-- Username Field -->
<div class="form-group row">
    {!! Form::label('username', 'Username',['class'=>'control-label col-sm-2']) !!}
    <div class="col-sm-4">
    <p>: {!! $user->username !!}</p>
    </div>
</div>

<!-- Role Id Field -->
<div class="form-group row">
    {!! Form::label('role_id', 'Role',['class'=>'control-label col-sm-2']) !!}
    <div class="col-sm-4">
    <p>: {!! $user->role->name !!} </p>
    </div>
</div>


<!-- Email Field -->
<div class="form-group row">
    {!! Form::label('email', 'Email',['class'=>'control-label col-sm-2']) !!}
    <div class="col-sm-4">
    <p>: {!! $user->email !!}</p>
    </div>
</div>
	</div>
</div>