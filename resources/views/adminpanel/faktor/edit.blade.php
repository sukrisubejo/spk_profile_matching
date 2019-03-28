@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Ubah Data Faktor</div>

                <div class="panel-body">
                    {{ Form::model($faktors, ['route'=>['faktor.update', $faktors->id_faktor], 'method'=>'PATCH']) }}
                        <div class="form-group{!! $errors->has('aspek') ? ' has-error' : '' !!}">
                          {{ Form::label('aspek','Jenis Aspek' , ['class' => 'control-label']) }}
                            <select id="aspek" class="form-control" name="aspek" required="required">
                              <option selected="selected" value="{{ $faktors->aspekid }}">{{ $faktors->aspek }}</option>
                              @foreach($aspeks as $aspek)
                                  @unless($aspek->id_aspek === $faktors->id_aspek)
                                    <option value={{ $aspek->id_aspek }}>{{ $aspek->aspek }}</option>
                                  @endunless
                              @endforeach
                            </select>
                            {!! $errors->first('aspek', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group{!! $errors->has('faktor') ? ' has-error' : '' !!}">
                            {{ Form::label('faktor', 'Nama Faktor') }}
                            {{ Form::text('faktor', null, ['class'=>'form-control', 'placeholder'=>'Masukkan Nama Faktor', 'required', 'oninvalid' => 'this.setCustomValidity("Nama Faktor Harus Diisi")', 'onchange' => 'this.setCustomValidity("")', 'maxlength' => '15']) }}
                            {!! $errors->first('faktor', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group{!! $errors->has('nilai') ? ' has-error' : '' !!}">
                            {{ Form::label('nilai', 'Nilai') }}
                            <select name="nilai" class="form-control" required="required">
                                @if($faktors->nilai_sub == 1)
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                @elseif($faktors->nilai_sub == 2)
                                <option value="2">2</option>
                                <option value="1">1</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                @elseif($faktors->nilai_sub == 3)
                                <option value="3">3</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                @elseif($faktors->nilai_sub == 4)
                                <option value="4">4</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="5">5</option>
                                @elseif($faktors->nilai_sub == 5)
                                <option value="5">5</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                @endif
                            </select>
                            {!! $errors->first('nilai', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group{!! $errors->has('kelompok') ? ' has-error' : '' !!}">
                            {{ Form::label('kelompok', 'Kelompok') }}
                            <select name="kelompok" class="form-control" required="required">
                              @if($faktors->kelompok == 'Core')
                              <option value="Core">Core</option>
                              <option value="Secondary">Secondary</option>
                              @else
                              <option value="Secondary">Secondary</option>
                              <option value="Core">Core</option>
                              @endif
                            </select>
                            {!! $errors->first('kelompok', '<p class="help-block">:message</p>') !!}
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
