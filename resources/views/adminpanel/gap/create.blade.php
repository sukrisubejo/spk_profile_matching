@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Data GAP</div>

                <div class="panel-body">
                    {{ Form::open(['route' => 'gap.store']) }}
                        <div class="form-group{!! $errors->has('selisih') ? ' has-error' : '' !!}">
                            {{ Form::label('selisih', 'Nilai Selisih ') }}
                            {{ Form::text('selisih', null, ['class'=>'form-control', 'placeholder'=>'Masukkan Nilai Selisih ', 'required', 'oninvalid' => 'this.setCustomValidity("Nilai Selisih Harus Diisi")', 'onchange' => 'this.setCustomValidity("")', 'maxlength' => '3']) }}
                            {!! $errors->first('selisih', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group{!! $errors->has('bobot') ? ' has-error' : '' !!}">
                            {{ Form::label('bobot', 'Nilai GAP') }}
                            {{ Form::text('bobot', null, ['class'=>'form-control', 'placeholder'=>'Masukkan Nilai Gap', 'required', 'oninvalid' => 'this.setCustomValidity("Nilai GAP Harus Diisi")', 'onchange' => 'this.setCustomValidity("")', 'maxlength' => '15']) }}
                            {!! $errors->first('bobot', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group{!! $errors->has('keterangan') ? ' has-error' : '' !!}">
                            {{ Form::label('keterangan', 'Keterangan') }}
                            {{ Form::text('keterangan', null, ['class'=>'form-control', 'placeholder'=>'Masukkan Keterangan', 'required', 'oninvalid' => 'this.setCustomValidity("Keterangan Harus Diisi")', 'onchange' => 'this.setCustomValidity("")', 'maxlength' => '255']) }}
                            {!! $errors->first('keterangan', '<p class="help-block">:message</p>') !!}
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
