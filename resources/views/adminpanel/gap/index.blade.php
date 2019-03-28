@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Nilai GAP</div>

                <div class="panel-body table-responsive">
                    @if(Session::has('alert-success'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4>    <i class="icon fa fa-check"></i> Berhasil!</h4>
                            {{ Session::get('alert-success') }}
                        </div>
                    @endif

                    {{ Form::open(array('route' => 'gap.destroy')) }}
                    {{ Form::hidden('_method', 'delete') }}

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="1%" class="nosort">
                                    {{ Form::checkbox('checkAll') }}
                                </th>
                                <td width="1%">No</td>
                                <td>Nilai Selisih</td>
                                <td>Nilai Gap</td>
                                <td>Keterangan</td>
                                <th class="nosort" width="1%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php $no=1; ?>
                            @foreach($gaps as $gap)
                            <tr>
                                <td>
                                    <input type="checkbox" id="checkItem" name="checkItem[]" class="checkGroup" value="{{ $gap->selisih }}" />
                                </td>
                                <td>{{ $no++ }}</td>
                                <td>{{ $gap->selisih }}</td>
                                <td>{{ $gap->bobot }}</td>
                                <td>{{ $gap->keterangan }}</td>
                                <td class="center" align="center">
                                    {{ Html::linkRoute('gap.edit', '', array($gap->selisih), array('class'=>'btn btn-xs btn-info glyphicon glyphicon-edit')) }}
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
                                    {{ Html::linkRoute('gap.create', '', array(), array('class' => 'btn btn-xs btn-primary glyphicon glyphicon-plus')) }}
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
