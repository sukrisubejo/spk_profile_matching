@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Data Aspek</div>

                <div class="panel-body table-responsive">
                    @if(Session::has('alert-success'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4>    <i class="icon fa fa-check"></i> Berhasil!</h4>
                            {{ Session::get('alert-success') }}
                        </div>
                    @endif

                    {{ Form::open(array('route' => 'aspek.destroy')) }}
                    {{ Form::hidden('_method', 'delete') }}

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="1%" class="nosort">
                                    {{ Form::checkbox('checkAll') }}
                                </th>
                                <th width="1%">No.</th>
                                <th>Jenis Aspek</th>
                                <th>Nilai Prosentase</th>
                                <th class="nosort" width="1%">Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php $no=1; ?>
                            @foreach($aspeks as $asp)
                            <tr>
                                <td>
                                    <input type="checkbox" id="checkItem" name="checkItem[]" class="checkGroup" value="{{ $asp->id_aspek }}" />
                                </td>
                                <td>{{ $no++ }}</td>
                                <td>{{ $asp->aspek }}</td>
                                <td>{{ $asp->prosentase }}</td>
                                <td class="center" align="center">
                                    {{ Html::linkRoute('aspek.edit', '', array($asp->id_aspek), array('class'=>'btn btn-xs btn-info glyphicon glyphicon-edit')) }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                        <tfoot>
                            <tr>
                                <td align="center">
                                    {{ Form::button('<i class="glyphicon glyphicon-remove"></i>', array('class'=>'btn btn-danger btn-xs btn-del', 'type'=>'submit')) }}
                                </td>
                                <td colspan="3"></td>
                                <td align="center">
                                    {{ Html::linkRoute('aspek.create', '', array(), array('class' => 'btn btn-xs btn-primary glyphicon glyphicon-plus')) }}
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
