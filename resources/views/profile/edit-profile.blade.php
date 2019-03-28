@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Ubah Profile</div>

                <div class="panel-body">
                    @if(Session::has('alert-success'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4>    <i class="icon fa fa-check"></i> Berhasil!</h4>
                            {{ Session::get('alert-success') }}
                        </div>
                    @endif
                    {!! Form::model($admins, ['url' => url('/settings/profile'), 'method' => 'post']) !!}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name', 'Nama') !!}
                            {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Masukkan Nama Anda', 'required', 'oninvalid' => 'this.setCustomValidity("Nama Harus Diisi")', 'onchange' => 'this.setCustomValidity("")', 'maxlength' => '25']) !!}
                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {!! Form::label('email', 'Email') !!}
                            {!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'Masukkan Email Anda', 'required', 'oninvalid' => 'this.setCustomValidity("Email Harus Diisi")', 'onchange' => 'this.setCustomValidity("")', 'maxlength' => '25']) !!}
                            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Ubah', ['class'=>'btn btn-info']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
