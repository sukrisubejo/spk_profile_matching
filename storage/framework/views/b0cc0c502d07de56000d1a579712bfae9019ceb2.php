<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Data Karyawan</div>

                <div class="panel-body table-responsive">

                    <?php if(Session::has('alert-success')): ?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?php echo e(Session::get('alert-success')); ?>

                        </div>
                    <?php endif; ?>

                    <?php echo e(Form::open(array('route' => 'karyawan.destroy'))); ?>

                    <?php echo e(Form::hidden('_method', 'delete')); ?>


                        <table id="example1" class="table table-responsive table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="1%" class="nosort">
                                        <?php echo e(Form::checkbox('checkAll')); ?>

                                    </th>
                                    <th width="1%">No. </th>
                                    <th>ID Karyawan</th>
                                    <th>Nama Karyawan</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Agama</th>
                                    <th>No Telepon</th>
                                    <th class="nosort" width="1%">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php $no=1; ?>
                                <?php foreach($karyawans as $karyawan): ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" id="checkItem" name="checkItem[]" class="checkGroup" value="<?php echo e($karyawan->id_karyawan); ?>" />
                                    </td>
                                    <td><?php echo e($no++); ?></td>
                                    <td><?php echo e($karyawan->id_karyawan); ?></td>
                                    <td><?php echo e($karyawan->nama); ?></td>
                                    <td><?php echo e($karyawan->tempat_lahir); ?></td>
                                    <td><?php echo e($karyawan->tgl_lahir); ?></td>
                                    <td><?php echo e($karyawan->kelamin); ?></td>
                                    <td><?php echo e($karyawan->agama); ?></td>
                                    <td><?php echo e($karyawan->phone); ?></td>
                                    <td class="center" align="center">
                                        <?php echo e(Html::linkRoute('karyawan.edit', '', array($karyawan->id_karyawan), array('class'=>'btn btn-xs btn-info glyphicon glyphicon-edit'))); ?>

                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <td align="center">
                                        <?php echo e(Form::button('<i class="glyphicon glyphicon-remove"></i>', array('class'=>'btn btn-danger btn-xs btn-del', 'type'=>'submit'))); ?>

                                    </td>
                                    <td colspan="8"></td>
                                    <td align="center">
                                        <?php echo e(Html::linkRoute('karyawan.create', '', array(), array('class' => 'btn btn-xs btn-primary glyphicon glyphicon-plus'))); ?>

                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </div>
</div>
    <script type="text/javascript">
        $(document).on('click', 'btn-del', function (e) {
            // body...
            var id = $(this).val();
            if ($('.id_karyawan'+id).find('.checkItem').is(':checked')==false) {
                alert('Please')
                return false;
            }

            if (confirm('Sure')) {
                $.ajax({
                    type : 'post',
                    url  : '<?php echo e(url('karyawan/deleteRecord')); ?>',
                    data : {'id_karyawan':id},
                    success:function (data) {
                        // body...
                        $('.id_karyawan'+id).remove();
                    }
                })
            }else{
                alert('Cancel')
            }
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>