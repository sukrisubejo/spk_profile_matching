@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Ubah Password</div>
                <div class="panel-body">
                    @if(Session::has('alert-success'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4>    <i class="icon fa fa-check"></i> Berhasil!</h4>
                            {{ Session::get('alert-success') }}
                        </div>
                    @endif
                    {!! Form::open(['url' => url('/settings/password'), 'method' => 'post']) !!}
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            {!! Form::label('password', 'Password') !!}
                            {!! Form::password('password', ['class'=>'form-control', 'placeholder' => 'Masukkan Password Sekarang']) !!}
                            {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                            {!! Form::label('new_password', 'New Password') !!}
                            {!! Form::password('new_password', ['class'=>'form-control', 'placeholder' => 'Masukkan Password Baru']) !!}
                            {!! $errors->first('new_password', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group{{ $errors->has('new_password_confirmation') ? ' has-error' : '' }}">
                            {!! Form::label('new_password_confirmation', 'Confirmation New Password') !!}
                            {!! Form::password('new_password_confirmation', ['class'=>'form-control', 'placeholder' => 'Konfirmasi Password Baru']) !!}
                            {!! $errors->first('new_password_confirmation', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Update', ['class'=>'btn btn-info']) !!} 
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
