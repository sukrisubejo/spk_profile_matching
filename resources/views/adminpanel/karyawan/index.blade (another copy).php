@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Data Karyawan</div>

                <div class="panel-body table-responsive">
                    @if(Session::has('alert-success'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4>    <i class="icon fa fa-check"></i> Berhasil!</h4>
                            {{ Session::get('alert-success') }}
                        </div>
                    @endif
                    <form action="{{ route('karyawan.destroy') }}" method="post" onsubmit="if(document.getElementById('categories').checked) { alert('Are You Sure?'); return true; } else { alert('Please Select One or More Row First to Delete!'); return false; }">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="delete">

                    <table id="example1" class="table table-responsive table-bordered table-striped">
                        <thead>
                            <tr>
                                <td width="1%" class="nosort">
                                    <input align="center" type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" id="select_all" />
                                </td>
                                <td width="1%">No. </td>
                                <td>ID Karyawan</td>
                                <td>Nama Karyawan</td>
                                <td>Tempat Lahir</td>
                                <td>Tanggal Lahir</td>
                                <td>Jenis Kelamin</td>
                                <td>Agama</td>
                                <td>No Telepon</td>
                                <td class="nosort" width="1%">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no=1; ?>
                            @foreach($karyawans as $karyawan)
                            <tr class="id">
                                <td><input type="checkbox" name="categories[]" class="categories" value="{{ $karyawan->id_karyawan }}" id="categories" /></td>
                                <td>{{ $no++ }}</td>
                                <td>{{ $karyawan->id_karyawan }}</td>
                                <td>{{ $karyawan->nama }}</td>
                                <td>{{ $karyawan->tempat_lahir }}</td>
                                <td>{{ $karyawan->tgl_lahir }}</td>
                                <td>{{ $karyawan->kelamin }}</td>
                                <td>{{ $karyawan->agama }}</td>
                                <td>{{ $karyawan->phone }}</td>
                                <td class="center" align="center">
                                        <a class="btn btn-xs btn-info glyphicon glyphicon-edit" href="{{ route('karyawan.edit', $karyawan->id_karyawan) }}"></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td align="center">
                                    <button class="btn btn-danger btn-xs btn-del" id="delete">
                                        <i class="glyphicon glyphicon-trash"></i>
                                    </button>
                                </td>
                                <td colspan="8"></td>
                                <td align="center"><a href="{{ route('karyawan.create') }}" class="btn btn-xs btn-primary glyphicon glyphicon-plus"></a>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#delete').click(function() {
        if($('#checkSurfaceEnvironment').not(':checked').length){
            alert('Not checked');
        }else{
            alert('Checked')
            } 
        });
</script>
@endsection
