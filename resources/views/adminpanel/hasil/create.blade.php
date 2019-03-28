@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Pendaftar</div>

                <div class="panel-body">
                    {{ Form::open(['route' => 'hasil.store']) }}
                    <div class="form-group{!! $errors->has('karyawans') ? ' has-error' : '' !!}">
                        {{ Form::label('karyawans', 'karyawans') }}
                        <select name="karyawans" class="form-control">
                            @foreach ($karyawans as $karyawan)
                            <option value="{{ $karyawan->id }}">{{ $karyawan->nama }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('karyawans', '<p class="help-block">:message</p>') !!}
                    </div>
                        <div class="form-group">
                            {{ Form::submit('Proses', ['class'=>'btn btn-primary  btn-xs']) }}
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
