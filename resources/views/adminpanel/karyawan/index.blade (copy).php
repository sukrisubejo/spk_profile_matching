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
                    <table id="example1" class="table table-responsive table-bordered table-striped">
                        <thead>
                            <tr>
                                <td><input type="checkbox" id="check_all"/></td>
                                <td width="1%">No. </td>
                                <td>ID Karyawan</td>
                                <td>Nama Karyawan</td>
                                <td>Tempat Lahir</td>
                                <td>Tanggal Lahir</td>
                                <td>Jenis Kelamin</td>
                                <td>Agama</td>
                                <td>No Telepon</td>
                                <td width="11%">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no=1; ?>
                            @foreach($karyawans as $karyawan)
                            <tr class="id_karyawan{{ $karyawan->id_karyawan }}">
                                <td><input id="chkbox" class="chkbox" type="checkbox" name="chkbox[]" value="{{ $karyawan->id_karyawan }}"></td>
                                <td>{{ $no++ }}</td>
                                <td>{{ $karyawan->id_karyawan }}</td>
                                <td>{{ $karyawan->nama }}</td>
                                <td>{{ $karyawan->tempat_lahir }}</td>
                                <td>{{ $karyawan->tgl_lahir }}</td>
                                <td>{{ $karyawan->kelamin }}</td>
                                <td>{{ $karyawan->agama }}</td>
                                <td>{{ $karyawan->phone }}</td>
                                <td class="center">
                                    <form method="POST" action="{{ route('karyawan.destroy', $karyawan->id_karyawan) }}" accept-charset="UTF-8">
                                        <input name="_method" type="hidden" value="DELETE">
                                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                        <button class="btn btn-danger btn-xs btn-del" value="{{ $karyawan->id_karyawan }}">
                                            <i class="glyphicon glyphicon-trash"></i>
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('karyawan.create') }}" class="btn btn-primary  btn-xs">Tambah</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
