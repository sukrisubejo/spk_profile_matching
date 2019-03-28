@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Manager</div>

                <div class="panel-body table-responsive">
                    @if(Session::has('alert-success'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4>    <i class="icon fa fa-check"></i> Berhasil!</h4>
                            {{ Session::get('alert-success') }}
                        </div>
                    @endif
                    <div align="center">
                        <h3>Manager</h3>
                        <br><br><br>
                        <h3>{{ $managers->nama }}</h3>
                        <hr width="50%">
                        <h3>NIK : {{ $managers->nip }}</h3>
                    </div>
                    <a href="{{ route('manager.edit', $managers->id) }}" class="btn btn-info btn-xs pull-right">Ubah</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
