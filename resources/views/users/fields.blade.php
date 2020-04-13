<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control',Auth::user()->role_id==1 ? '' : 'readonly' ]) !!}
</div>
<!-- Username Field -->
<div class="form-group col-sm-6">
    {!! Form::label('username', 'Username:') !!}
    {!! Form::text('username', null, ['class' => 'form-control',Auth::user()->role_id==1 ? '' : 'readonly']) !!}
</div>
@if (\Auth::user()->role_id==1)
<!-- Role Id Field -->
<div class="form-group col-sm-6" >
    {!! Form::label('role_id', 'Role:') !!}
    {!! Form::select('role_id', $role, null, ['class' => 'form-control']) !!}
</div>
@else
<div class="form-group col-sm-6">
    {!! Form::label('opd_id', 'Role:') !!}
    <p>{!! $user->role->name  ? $user->role->name : 'Administrator' !!} {!! Form::hidden('role_id',$user->role_id) !!} </p>
</div>
@endif

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
    @if(isset($user))
        <span style="font-size:10px">Kosongi apabila tidak merubah password.</span>
    @endif
</div>

<div class="form-group col-sm-6">
    {!! Form::label('password_confirmation', 'Konfimasi Password:') !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
    @if(isset($user))
        <span style="font-size:10px">Kosongi apabila tidak merubah password.</span>
    @endif
</div>

<div class="form-group col-sm-6">
    {!! Form::label('avatar', 'Gambar Profile:') !!}
    <div class="col-md-6">
        <input id="avatar" type="file" class="form-control" name="avatar">
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
</div>
