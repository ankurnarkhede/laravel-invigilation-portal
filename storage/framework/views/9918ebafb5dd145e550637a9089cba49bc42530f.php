<?php $__env->startSection('title'); ?>
    Send SMS | SGGSIE&T Invigilation
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <?php echo $__env->make('message_block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>

    
    <div class="row no-m-t no-m-b">
        <div class="col s12 m12 l12">
            <div class="row card darken-1" style="padding: 2% 0 0 1%;">
                <h5 class="text_center">Send SMS</h5>
                <span style="color: red"></span>
                <span style="color: green"></span>
                <span style="color: green"></span>
                <form style="padding: 1% 0 5% 1%;" class="col s12" action="<?php echo e(route('send-sms')); ?>" enctype="multipart/form-data" method="POST" >

                    <div class="input-field col s12">
                        <i class="material-icons prefix">phone</i>
                        <input id="phone" name="phone" type="number" class="validate">
                        <label for="phone">Phone Number</label>
                    </div>

                    <div class="input-field col s12">
                        <i class="material-icons prefix">textsms</i>
                        <textarea id="sms_text" name="sms_text" class="materialize-textarea"></textarea>
                        <label for="textarea1">Message</label>
                    </div>


                    <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">

                    <button class="btn waves-effect waves-light" type="submit" name="send_sms">Send SMS

                    </button>
                </form>
            </div>

        </div>
    </div>
    

    
    <div class="row no-m-t no-m-b">
        <div class="col s12">

        </div>
        <div class="col s12 m12 l12">
            <div class="card">
                <div class="card-content">
                    <h5 class="text_center">SMS Log</h5>
                    <br>
                    <table id="example" class="display responsive-table datatable-example">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Sent To</th>
                            <th>Sent By</th>
                            <th>Msg</th>
                            <th>Time</th>
                            <th>Request ID</th>
                            <th>Success</th>

                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>id</th>
                            <th>Sent To</th>
                            <th>Sent By</th>
                            <th>Msg</th>
                            <th>Time</th>
                            <th>Request ID</th>
                            <th>Success</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <?php
                        $count=0;
                        ?>

                        <?php $__currentLoopData = $sms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sms): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            $count++;
                            ?>
                            <tr>
                            <td><?php echo $count ?></td>
                            <td><?php echo e($sms->sent_to); ?></td>
                            <td><?php echo e($sms->from); ?></td>
                            <td><?php echo e($sms->sms_text); ?></td>
                            <td><?php echo e($sms->created_at); ?></td>
                            <td><?php echo e($sms->request_id); ?></td>
                            <td style="font-weight: bold;"><?php echo e($sms->success); ?></td>

                        </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    





    <script>
        var token='<?php echo e(Session::token()); ?>';
        url_user_edit = '<?php echo e(route('user-edit')); ?>';
    </script>

    <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
    <script src="assets/plugins/materialize/js/materialize.min.js"></script>
    <script src="assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/pages/table-data.js"></script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>