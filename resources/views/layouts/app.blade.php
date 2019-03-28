<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{asset('Mario-icon.png')}}">
    <title>SPK Profile Matching</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    {{ Html::style('/bootstrap/bootstrap/css/bootstrap.css') }}
    {{ Html::style('/bootstrap/bootstrap/css/bootstrap-theme.css') }}
    <style type="text/css">
        .fileUpload {
            position: relative;
            overflow: hidden;
            margin: 10px;
            }
            .fileUpload input.upload {
                position: absolute;
                top: 0;
                right: 0;
                margin: 0;
                padding: 0;
                font-size: 20px;
                cursor: pointer;
                opacity: 0;
                filter: alpha(opacity=0);
        }
    </style>

    <!-- Bootstrap dataTables -->
    {{Html::style('/bootstrap/datatable/media/css/dataTables.bootstrap4.css')}}
    {{Html::style('/bootstrap/datatable/extensions/Responsive/css/responsive.bootstrap4.css')}}
    {{Html::style('/bootstrap/datatable/extensions/FixedHeader/css/fixedHeader.bootstrap4.css')}}
    <style type="text/css">
        table.dataTable th,
        table.dataTable td {
        white-space: nowrap;
        }
    </style>
    <!-- BootStrap DatePicker -->
    {{Html::style('/bootstrap/datepicker/dist/css/bootstrap-datepicker.css')}}

    <!-- Scripts -->
    {{ Html::script('/js/jquery-3.2.0.js') }}
    {{ Html::script('/bootstrap/bootstrap/js/bootstrap.js') }}
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    SPK Profile Matching
                </a>
            </div>




                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <!-- <li><a href="{{ url('/register') }}">Register</a></li> -->
                    @else
                        <li><a href="{{ route('karyawan.index') }}">Karyawan</a></li>
                        <li><a href="{{ route('aspek.index') }}">Aspek</a></li>
                        <li><a href="{{ route('faktor.index') }}">Faktor</a></li>
                        <li><a href="{{ route('gap.index') }}">GAP</a></li>
                        <li><a href="{{ route('nilai.index') }}">Nilai Karyawan</a></li>
                        <li><a href="{{ route('hasil.index') }}">Result</a></li>
                        <li><a href="{{ route('manager.index') }}">Manager</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="javascript:;"><i class="fa fa-btn fa-user"></i>Ubah Profil</a></li>
                                <li><a href="javascript:;"><i class="fa fa-btn fa-key"></i>Ubah Password</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
    <!-- Scripts -->

    <!-- Scripts Bootstrap dataTables -->
    {{Html::script('/bootstrap/datatable/media/js/jquery.dataTables.js')}}
    {{Html::script('/bootstrap/datatable/media/js/dataTables.bootstrap4.js')}}
    {{Html::script('/bootstrap/datatable/extensions/Responsive/js/dataTables.responsive.js')}}
    {{Html::script('/bootstrap/datatable/extensions/Responsive/js/responsive.bootstrap4.js')}}
    {{Html::script('/bootstrap/datatable/extensions/FixedHeader/js/dataTables.fixedHeader.js')}}
    <script type="text/javascript">
        $(function() {
            $('table.table').dataTable( {
                     "order": [],
            "columnDefs": [ {
              "targets"  : 'nosort',
              "orderable": false,
            }]
        } );
        });
    </script>

    <!-- Scripts BootStap DatePicker -->
    {{Html::script('/bootstrap/datepicker/dist/js/bootstrap-datepicker.js')}}
    <script type="text/javascript">
        $(".input-group.date").datepicker({
            format: "dd-mm-yyyy",
            autoclose: true, 
            todayHighlight: true
        });
    </script>

    <!-- CheckBox -->
    <script type="text/javascript">

        //select all checkboxes
        $('input[name="checkAll"]').change(function(){  //"select all" change
            $(".checkGroup").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
        });

        //".checkbox" change
        $('.checkGroup').change(function(){
            //uncheck "select all", if one of the listed checkbox item is unchecked
            if(false == $(this).prop("checked")){ //if this item is unchecked
                $('input[name="checkAll"]').prop('checked', false); //change "select all" checked status to false
           }
            //check "select all" if all checkbox items are checked
            if ($('.checkGroup:checked').length == $('.checkGroup').length ){
                $('input[name="checkAll"]').prop('checked', true);
            }
        });
    </script>
</body>
</html>
