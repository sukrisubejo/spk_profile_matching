@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Penilaian Karyawan</div>

                <div class="panel-body table-responsive">
                    @if(Session::has('alert-success'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4>    <i class="icon fa fa-check"></i> Berhasil!</h4>
                            {{ Session::get('alert-success') }}
                        </div>
                    @endif

                    {{ Form::open(array('route' => 'nilai.destroy')) }}
                    {{ Form::hidden('_method', 'delete') }}

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="1%" class="nosort">
                                    {{ Form::checkbox('checkAll') }}
                                </th>
                                <td width="1%">No</td>
                                <td>Nama Karyawan</td>
                                <td>Jenis Aspek</td>
                                <td>Nama Faktor</td>
                                <td>Nilai</td>
                                <th class="nosort" width="1%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach($nilais as $nilai)
                            <tr>
                                <td>
                                    <input type="checkbox" id="checkItem" name="checkItem[]" class="checkGroup" value="{{ $nilai->id }}" />
                                </td>
                                <td>{{ $no++ }}</td>
                                <td>{{ $nilai->nama }}</td>
                                <td>{{ $nilai->aspek}}</td>
                                <td>{{ $nilai->faktor }}</td>
                                <td>{{ $nilai->nilai }}</td>
                                <td class="center" align="center">
                                    {{ Html::linkRoute('nilai.edit', '', array($nilai->id), array('class'=>'btn btn-xs btn-info glyphicon glyphicon-edit')) }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td align="center">
                                    {{ Form::button('<i class="glyphicon glyphicon-remove"></i>', array('class'=>'btn btn-danger btn-xs btn-del', 'type'=>'submit')) }}
                                </td>
                                <td colspan="5"></td>
                                <td align="center">
                                    {{ Html::linkRoute('nilai.create', '', array(), array('class' => 'btn btn-xs btn-primary glyphicon glyphicon-plus')) }}
                                </td>
                            </tr>
                         </tfoot>
                    </table>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
