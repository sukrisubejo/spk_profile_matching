@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Faktor</div>

                <div class="panel-body">
                    {{ Form::open(['route' => 'faktor.store']) }}
                    <div class="form-group{!! $errors->has('aspek') ? ' has-error' : '' !!}">
                        {{ Form::label('aspek', 'Jenis Aspek') }}
                        {{ Form::select('aspek', $aspeks, null,['class'=>'form-control', 'placeholder'=>'Pilih Jenis Aspek']) }}
                        {!! $errors->first('aspek', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group{!! $errors->has('faktor') ? ' has-error' : '' !!}">
                        {{ Form::label('faktor', 'Nama Faktor') }}
                        {{ Form::text('faktor', null, ['class'=>'form-control', 'placeholder'=>'Masukkan Nama Faktor', 'required', 'oninvalid' => 'this.setCustomValidity("Nama Faktor Harus Diisi")', 'onchange' => 'this.setCustomValidity("")', 'maxlength' => '15']) }}
                        {!! $errors->first('faktor', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group{!! $errors->has('nilai') ? ' has-error' : '' !!}">
                        {{ Form::label('nilai', 'Nilai') }}
                        {{ Form::select('nilai', array('1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4', '5'=>'5'), null, ['class'=>'form-control', 'placeholder'=>'Pilih Nilai']) }}
                        {!! $errors->first('nilai', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group{!! $errors->has('kelompok') ? ' has-error' : '' !!}">
                        {{ Form::label('kelompok', 'Kelompok') }}
                        {{ Form::select('kelompok', array('Core'=>'Core', 'Secondary'=>'Secondary'), null, ['class'=>'form-control', 'placeholer'=>'Pilih Kelompok']) }}
                        {!! $errors->first('kelompok', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group">
                        {{ Form::submit('Simpan', ['class'=>'btn btn-primary  btn-xs']) }}
                        {{ Form::button('Batal', ['class'=>'btn btn-danger btn-xs', 'onClick'=>'history.back();']) }}
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
