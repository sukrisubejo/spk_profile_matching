@extends('layouts.app')

@section('content')
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="aspek"]').on('change', function() {
            var aspekID = $(this).val();
            if(aspekID) {
                $.ajax({
                    url: '/nilai/edit/'+aspekID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="id_faktor"]').empty();
                        $.each(data, function(aspek, value) {
                            $('select[name="id_faktor"]').append('<option value="'+ aspek +'">'+ value +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="id_faktor"]').empty();
            }
        });
    });
</script>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Data Nilai Karyawan</div>
                <div class="panel-body">
                    {{ Form::open(['route' => 'nilai.store']) }}
                    <div class="form-group{!! $errors->has('id_karyawan') ? ' has-error' : '' !!}">
                        {{ Form::label('karyawa', 'Nama Karyawan') }}
                        <select name="id_karyawan" class="form-control" required="required">
                            @foreach ($karyawans as $karyawan)
                            <option value="{{ $karyawan->id_karyawan }}">{{ $karyawan->nama }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('id_karyawan', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group{!! $errors->has('aspek') ? ' has-error' : '' !!}">
                        {{ Form::label('aspek', 'Jenis Aspek') }}
                        <select name="aspek" class="form-control" required="required">
                          <option value="">--- Pilih Kriteria ---</option>
                            @foreach ($aspeks as $aspek => $value)
                            <option value="{{ $aspek }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('aspek', '<p class="help-block">:message</p>') !!}
                    </div>
                        <div class="form-group{!! $errors->has('id_faktor') ? ' has-error' : '' !!}">
                            {{ Form::label('id_faktor', 'Nama Faktor') }}
                            <select name="id_faktor" class="form-control" required="required"></select>
                            {!! $errors->first('id_faktor', '<p class="help-block">:message</p>') !!}
                        </div>


                        <div class="form-group{!! $errors->has('nilai') ? ' has-error' : '' !!}">
                            {{ Form::label('nilai', 'Nilai') }}
                            {{ Form::select('nilai', array('1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4', '5'=>'5'), null, ['class'=>'form-control', 'placeholder'=>'Pilih Nilai']) }}
                            {!! $errors->first('nilai', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group">
                            {{ Form::submit('Tambah', ['class'=>'btn btn-primary  btn-xs']) }}
                            {{ Form::button('Batal', ['class'=>'btn btn-danger btn-xs', 'onClick'=>'history.back();']) }}
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
