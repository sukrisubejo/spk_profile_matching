<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo e(asset('Mario-icon.png')); ?>">
    <title>SPK Profile Matching</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <?php echo e(Html::style('/bootstrap/bootstrap/css/bootstrap.css')); ?>

    <?php echo e(Html::style('/bootstrap/bootstrap/css/bootstrap-theme.css')); ?>

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
    <?php echo e(Html::style('/bootstrap/datatable/media/css/dataTables.bootstrap4.css')); ?>

    <?php echo e(Html::style('/bootstrap/datatable/extensions/Responsive/css/responsive.bootstrap4.css')); ?>

    <?php echo e(Html::style('/bootstrap/datatable/extensions/FixedHeader/css/fixedHeader.bootstrap4.css')); ?>

    <style type="text/css">
        table.dataTable th,
        table.dataTable td {
        white-space: nowrap;
        }
    </style>
    <!-- BootStrap DatePicker -->
    <?php echo e(Html::style('/bootstrap/datepicker/dist/css/bootstrap-datepicker.css')); ?>


    <!-- Scripts -->
    <?php echo e(Html::script('/js/jquery-3.2.0.js')); ?>

    <?php echo e(Html::script('/bootstrap/bootstrap/js/bootstrap.js')); ?>

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
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    SPK Profile Matching
                </a>
            </div>




                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <?php if(Auth::guest()): ?>
                        <li><a href="<?php echo e(url('/login')); ?>">Login</a></li>
                        <!-- <li><a href="<?php echo e(url('/register')); ?>">Register</a></li> -->
                    <?php else: ?>
                        <li><a href="<?php echo e(route('karyawan.index')); ?>">Karyawan</a></li>
                        <li><a href="<?php echo e(route('aspek.index')); ?>">Aspek</a></li>
                        <li><a href="<?php echo e(route('faktor.index')); ?>">Faktor</a></li>
                        <li><a href="<?php echo e(route('gap.index')); ?>">GAP</a></li>
                        <li><a href="<?php echo e(route('nilai.index')); ?>">Nilai Karyawan</a></li>
                        <li><a href="<?php echo e(route('hasil.index')); ?>">Result</a></li>
                        <li><a href="<?php echo e(route('manager.index')); ?>">Manager</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="javascript:;"><i class="fa fa-btn fa-user"></i>Ubah Profil</a></li>
                                <li><a href="javascript:;"><i class="fa fa-btn fa-key"></i>Ubah Password</a></li>
                                <li><a href="<?php echo e(url('/logout')); ?>"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <?php echo $__env->yieldContent('content'); ?>
    <!-- Scripts -->

    <!-- Scripts Bootstrap dataTables -->
    <?php echo e(Html::script('/bootstrap/datatable/media/js/jquery.dataTables.js')); ?>

    <?php echo e(Html::script('/bootstrap/datatable/media/js/dataTables.bootstrap4.js')); ?>

    <?php echo e(Html::script('/bootstrap/datatable/extensions/Responsive/js/dataTables.responsive.js')); ?>

    <?php echo e(Html::script('/bootstrap/datatable/extensions/Responsive/js/responsive.bootstrap4.js')); ?>

    <?php echo e(Html::script('/bootstrap/datatable/extensions/FixedHeader/js/dataTables.fixedHeader.js')); ?>

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
    <?php echo e(Html::script('/bootstrap/datepicker/dist/js/bootstrap-datepicker.js')); ?>

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
