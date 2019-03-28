<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Data Faktor</div>

                <div class="panel-body table-responsive">
                    <?php if(Session::has('alert-success')): ?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4>    <i class="icon fa fa-check"></i> Berhasil!</h4>
                            <?php echo e(Session::get('alert-success')); ?>

                        </div>
                    <?php endif; ?>

                    <?php echo e(Form::open(array('route' => 'faktor.destroy'))); ?>

                    <?php echo e(Form::hidden('_method', 'delete')); ?>


                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="1%" class="nosort">
                                    <?php echo e(Form::checkbox('checkAll')); ?>

                                </th>
                                <td width="1%">No</td>
                                <td>Jenis Aspek</td>
                                <td>Nama Faktor</td>
                                <td>Nilai</td>
                                <td>Kelompok</td>
                                <th class="nosort" width="1%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            <?php foreach($faktors as $faktor): ?>
                            <tr>
                                <td>
                                    <input type="checkbox" id="checkItem" name="checkItem[]" class="checkGroup" value="<?php echo e($faktor->id_faktor); ?>" />
                                </td>
                                <td><?php echo e($no++); ?></td>
                                <td><?php echo e($faktor->aspek); ?></td>
                                <td><?php echo e($faktor->faktor); ?></td>
                                <td><?php echo e($faktor->nilai_sub); ?></td>
                                <td><?php echo e($faktor->kelompok); ?></td>
                                <td class="center" align="center">
                                    <?php echo e(Html::linkRoute('faktor.edit', '', array($faktor->id_aspek), array('class'=>'btn btn-xs btn-info glyphicon glyphicon-edit'))); ?>

                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>

                        <tfoot>
                            <tr>
                                <td align="center">
                                    <?php echo e(Form::button('<i class="glyphicon glyphicon-remove"></i>', array('class'=>'btn btn-danger btn-xs btn-del', 'type'=>'submit'))); ?>

                                </td>
                                <td colspan="5"></td>
                                <td align="center">
                                    <?php echo e(Html::linkRoute('faktor.create', '', array(), array('class' => 'btn btn-xs btn-primary glyphicon glyphicon-plus'))); ?>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>