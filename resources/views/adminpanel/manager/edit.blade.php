@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Ubah Data Manager</div>

                <div class="panel-body">
                    {{ Form::model($managers, ['route'=>['manager.update', $managers->id], 'method'=>'PATCH']) }}
                        <div class="form-group{!! $errors->has('nip') ? ' has-error' : '' !!}">
                            {{ Form::label('nip', 'NIK') }}
                            {{ Form::text('nip', null, ['class'=>'form-control', 'placeholder'=>'Masukkan NIP/NIK' , 'required', 'oninvalid' => 'this.setCustomValidity("NIK Manager Harus Diisi")', 'onchange' => 'this.setCustomValidity("")', 'maxlength' => '16']) }}
                            {!! $errors->first('nip', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group{!! $errors->has('nama') ? ' has-error' : '' !!}">
                            {{ Form::label('nama', 'Nama Manager') }}
                            {{ Form::text('nama', null, ['class'=>'form-control', 'placeholder'=>'Masukkan Nama Manager', 'required', 'oninvalid' => 'this.setCustomValidity("Nama Manager Harus Diisi")', 'onchange' => 'this.setCustomValidity("")', 'maxlength' => '50']) }}
                            {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group">
                            {{ Form::submit('Ubah', ['class'=>'btn btn-primary  btn-xs']) }}
                            {{ Form::button('Batal', ['class'=>'btn btn-danger btn-xs', 'onClick'=>'history.back();']) }}
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
