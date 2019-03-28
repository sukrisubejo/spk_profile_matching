@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <dir class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="text-center">
                            Sistem Pendukung Keputusan
                        </h3><br>
                        </p>
                        <p class="text-center">
                            Metode
                        </p><br>
                            <h3 class="text-center">Profile Matching </h3><br><br>
                        <p class="text-center"><br>
                            <a href="{{ url('/pengumuman') }}" class="btn btn-success">Pengumuman</a>
                        </p>
                    </div>
                </div>
            </dir>
        </div>
    </div>
</div>
@endsection
