@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Result</div>
                <div class="panel-body"><center><h4><b><br>Skala<br><br></b></h1></center>
                    <table class="table table-responsive table-bordered table-striped">
                        <thead>
                            <tr>
                                <td width="5%">No</td>
                                <td width="15%">Nama Karyawan</td>
                                <td width="15%">Jenis Aspek</td>
                                <td>Nama Faktor</td>
                                <td>Skala</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach ($result1 as $hsl)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $hsl->nama }}</td>
                                <td>{{ $hsl->aspek }}</td>
                                <td>{{ $hsl->faktor }}</td>
                                <td>{{ $hsl->skala }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table><center><h4><b><br>Hasil<br><br></b></h1></center>
                    <table class="table table-responsive table-bordered table-striped">
                        <thead>
                            <tr>
                                <td width="5%">No</td>
                                <td width="15%">Nama Karyawan</td>
                                <td width="15%">Jenis Aspek</td>
                                <td>Nama Faktor</td>
                                <td>Nilai Target</td>
                                <td>Nilai Karyawan</td>
                                <td>Hasil</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach ($result as $hsl)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $hsl->nama }}</td>
                                <td>{{ $hsl->aspek }}</td>
                                <td>{{ $hsl->faktor }}</td>
                                <td>{{ $hsl->nilai }}</td>
                                <td>{{ $hsl->nilai_sub }}</td>
                                <td>{{ $hsl->hasil }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table><center><h4><b><br>Nilai Bobot<br><br></b></h1></center>
                    <table class="table table-responsive table-bordered table-striped">
                        <thead>
                            <tr>
                                <td width="5%">No</td>
                                <td width="15%">Nama Karyawan</td>
                                <td width="15%">Jenis Aspek</td>
                                <td>Nama Faktor</td>
                                <td>Nilai Bobot</td>
                                <td>Kelompok</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach ($result as $hsl1)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $hsl1->nama }}</td>
                                <td>{{ $hsl1->aspek }}</td>
                                <td>{{ $hsl1->faktor }}</td>
                                <td>{{ $hsl1->bobot }}</td>
                                <td>{{ $hsl1->kelompok}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table><center><h4><b><br>Nilai Core Secondary<br><br></b></h1></center>
                    <table class="table table-responsive table-bordered table-striped">
                        <thead>
                            <tr>
                                <td width="5%">No</td>
                                <td width="15%">Nama Karyawan</td>
                                <td>Nilai Core</td>
                                <td>Nilai Secondary</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach ($result2 as $hsl2)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $hsl2->nama }}</td>
                                <td>{{ $hsl2->core }}</td>
                                <td>{{ $hsl2->secondary }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table><center><h4><b><br>Ranking<br><br></b></h1></center>
                    <table class="table table-responsive table-bordered table-striped">
                        <thead>
                            <tr>
                                <td width="5%">No</td>
                                <td width="15%">Nama Karyawan</td>
                                <td>Nilai I</td>
                                <td>Nilai S</td>
                                <td>Nilai P</td>
                                <td>Hasil</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach ($result3 as $hsl3)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $hsl3->nama }}</td>
                                <td>{{ $hsl3->Ni }}</td>
                                <td>{{ $hsl3->Ns }}</td>
                                <td>{{ $hsl3->Np }}</td>
                                <td>{{ $hsl3->Hasil }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
