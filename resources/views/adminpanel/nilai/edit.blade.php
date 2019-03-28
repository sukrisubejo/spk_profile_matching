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
                <div class="panel-heading">Ubah Data Nilai Karyawan</div>
                <div class="panel-body table-responsive">
                    {{ Form::model($nilais, ['route'=>['nilai.update', $nilais->id], 'method'=>'PATCH']) }}
                    <div class="form-group{!! $errors->has('id_karyawan') ? ' has-error' : '' !!}">
                        {{ Form::label('id_karyawan','Nama Karyawan' , ['class' => 'control-label']) }}
                        <select id="id_karyawan" class="form-control" name="id_karyawan" required="required">
                            <option selected="selected" value="{{ $nilais->karyawan_id }}">{{ $nilais->karyawan_name }}</option>
                            @foreach($karyawans as $karyawan)
                                @unless($karyawan->id_karyawan === $nilais->karyawan_id)
                                    <option value={{ $karyawan->id_karyawan }}>{{ $karyawan->nama }}</option>
                                @endunless
                            @endforeach
                        </select>
                    {!! $errors->first('id_karyawan', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group{!! $errors->has('aspek') ? ' has-error' : '' !!}">
                        {{ Form::label('aspek','Jenis Aspek' , ['class' => 'control-label']) }}
                        <select id="aspek" class="form-control" name="aspek" required="required">
                            <option selected="selected" value="{{ $nilais->aspek_id }}">{{ $nilais->aspek_name }}</option>
                            @foreach($aspeks as $aspek)
                                @unless($aspek->id_aspek === $nilais->aspek_id)
                                    <option value={{ $aspek->id_aspek }}>{{ $aspek->aspek }}</option>
                                @endunless
                            @endforeach
                        </select>
                        {!! $errors->first('aspek', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group{!! $errors->has('id_faktor') ? ' has-error' : '' !!}">
                    {{ Form::label('id_faktor','Nama Faktor' , ['class' => 'control-label']) }}
                        <select id="id_faktor" class="form-control" name="id_faktor" required="required">
                            <option selected="selected" value="{{ $nilais->faktor_id }}">{{ $nilais->faktor_name }}</option>
                            @foreach($faktors as $faktor)
                                @unless($faktor->id_faktor === $nilais->faktor_id)
                                    <option value={{ $faktor->id_faktor }}>{{ $faktor->faktor }}</option>
                                @endunless
                            @endforeach
                        </select>
                      {!! $errors->first('id_faktor', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group{!! $errors->has('nilai') ? ' has-error' : '' !!}">
                    {{ Form::label('nilai', 'Nilai') }}
                        <select name="nilai" class="form-control" required="required">
                        @if($nilais->nilai == '1')
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">5</option>
                            <option value="5">5</option>
                        @elseif($nilais->nilai == '2')
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="1">1</option>
                        @elseif($nilais->nilai == '3')
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        @elseif($nilais->nilai == '4')
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        @elseif($nilais->nilai == '5')
                            <option value="5">5</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        @endif
                        </select>
                    {!! $errors->first('nilai', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group">
                        {{ Form::submit('Ubah', ['class'=>'btn btn-primary btn-xs']) }}
                        {{ Form::button('Batal', ['class'=>'btn btn-danger btn-xs', 'onClick'=>'history.back();']) }}
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
