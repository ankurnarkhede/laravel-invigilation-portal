 
 
 
 
 





<?php $__env->startSection('title'); ?>
    Schedule Invigilation | SGGSIE&T Invigilation
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <?php echo $__env->make('message_block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>

    

    <div class="row no-m-t no-m-b">
        <div class="col s12 m12 l12">
            <div class="row card darken-1 card_form_padding">

                <h4 class="text_center">Schedule Invigilation</h4>

                <div class="row">
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s6"><a class="active" href="#manual">Add Invigilation</a></li>
                            <li class="tab col s6"><a  href="#upload">Upload a File</a></li>

                        </ul>
                    </div>

                    
                    <div id="manual" class="col s12">
                        <h5 class="text_center">Add Invigilation</h5>
                        <span></span>
                        <form class="col s12" action="<?php echo e(route('schedule-manually')); ?>" enctype="multipart/form-data" method="POST" >

                            <div class="bottom0 row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input name="fac_name" id="fac_name" type="text" class="validate" required="required">
                                    <label for="fac_name">Name of Faculty</label>
                                </div>
                            </div>

                            <div class="bottom0 row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">phone</i>
                                    <input maxlength="10" name="fac_contact" id="fac_contact" type="number" class="validate" required="required">
                                    <label for="fac_contact">Contact Number</label>
                                </div>
                            </div>

                            <div class="bottom0 row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">list</i>
                                    <select name="select_exam" required="required"  >
                                        <option value="" disabled  selected>Select Exam</option>

                                        <?php $__currentLoopData = $exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($exam->exam_name); ?>"><?php echo e($exam->exam_name); ?></option>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>
                                    <label>Exam Name</label>
                                </div>
                            </div>

                            <div class="bottom0 row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">list</i>
                                    <select name="select_dept" required="required"  >
                                        <option value="" disabled  selected>Select Department</option>


                                        <option value="CSE">CSE</option>
                                        <option value="EXTC">EXTC</option>
                                        <option value="CHEM">CHEM</option>
                                        <option value="INFT">INFT</option>
                                        <option value="INST">INST</option>
                                        <option value="MECH">MECH</option>
                                        <option value="PROD">PROD</option>
                                        <option value="TEXT">TEXT</option>
                                        <option value="CIVIL">CIVIL</option>
                                        <option value="ELEC">ELEC</option>



                                    </select>
                                    <label>Exam Name</label>
                                </div>
                            </div>


                            <div class="bottom0 row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">date_range</i>
                                    <label for="date">Date</label>
                                    <input name="date" id="date" type="text" class="datepicker">
                                </div>
                            </div>

                            <div class="bottom0 row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">access_time</i>
                                    <label for="time">Time</label>
                                    <input name="time" id="time" type="text" class="timepicker">

                                    <span class=""><div>Time format: <span class="red-text">11:30AM - 1:00AM</span></div></span>


                                </div>
                            </div>


                            <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">

                            <button class="btn waves-effect waves-light" type="submit" name="add">Add
                                <i class="material-icons right">send</i>
                            </button>
                        </form>










                    </div>

                    
                    <div id="upload" class="col s12">
                        <h5 class="text_center">Add Invigilation</h5>
                        <span></span>
                        <form class="col s12" action="<?php echo e(route('schedule-upload')); ?>" enctype="multipart/form-data" method="POST" >



                            <div class="bottom0 row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">list</i>
                                    <select name="select_exam" required="required" id="select_exam"  >
                                        <option value="" disabled  selected>Select Exam</option>

                                        <?php $__currentLoopData = $exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($exam->exam_name); ?>"><?php echo e($exam->exam_name); ?></option>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>
                                    <label>Exam Name</label>
                                </div>
                            </div>


                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>Upload CSV File</span>
                                    <input type="file" name="csv" id="csv">
                                </div>
                                <div class="file-path-wrapper">
                                    <input id="csv_file" name="csv_file" class="file-path validate" type="text">
                                </div>

                            </div>


                            <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">

                            <button class="btn waves-effect waves-light" type="submit" name="add">Add
                                <i class="material-icons right">send</i>
                            </button>
                        </form>
















                    </div>
                </div>

            </div>

        </div>
    </div>

    


    
    <div class="row no-m-t no-m-b">
        <div class="col s12">

        </div>
        <div class="col s12 m12 l12">
            <div class="card">
                <div class="card-content">
                    <h5 class="text_center">Scheduled Invigilations</h5>
                    <br>
                    <table id="example" class="display responsive-table datatable-example">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Faculty Name</th>
                            <th>Faculty Contact</th>
                            <th>Exam</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Approve</th>
                            <th>SMS 1</th>
                            <th>SMS 2</th>

                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>id</th>
                            <th>Faculty Name</th>
                            <th>Faculty Contact</th>
                            <th>Exam</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Approved</th>
                            <th>SMS 1</th>
                            <th>SMS 2</th>
                        </tr>
                        </tfoot>
                        <tbody>

                        <?php
                        $count=0;
                        ?>

                        <?php $__currentLoopData = $schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            $count++;
                            ?>
                            <tr>
                                <td><?php echo $count ?></td>
                                <td><?php echo e($schedule->fac_name); ?></td>
                                <td><?php echo e($schedule->fac_phone); ?></td>
                                <td><?php echo e($schedule->exam); ?></td>
                                <td><?php echo e($schedule->date); ?></td>
                                <td><?php echo e($schedule->time); ?></td>
                                <td>
                                    <form method="post" action="<?php echo e(route('invigilation-status')); ?>">
                                        <input type="text" name="schedule_id" id="schedule_id" class="display_none" value="<?php echo e($schedule->id); ?>">
                                        <input type="text" name="schedule_approve" id="schedule_approve" class="display_none" value="<?php echo e($schedule->approve); ?>">
                                        <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">


                                    <?php if( $schedule->approve !=0): ?>
                                        <span class="green-text ">Yes</span>

                                        <button class="btn waves-effect waves-light" type="submit" name="approve_change">Disapprove</button>

                                    <?php else: ?>
                                        <span class="red-text ">No</span>

                                        <button class="btn waves-effect waves-light" type="submit" name="approve_change">Approve</button>

                                    <?php endif; ?>

                                    </form>

                                </td>
                                <td>
                                    <?php if( $schedule->sent_1 !=0): ?>
                                        <span class="green-text ">Sent</span>
                                    <?php else: ?>
                                        <span class="red-text ">Not Sent</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if( $schedule->sent_2 !=0): ?>
                                        <span class="green-text ">Sent</span>
                                    <?php else: ?>
                                        <span class="red-text ">Not Sent</span>
                                    <?php endif; ?>
                                </td>

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

    </script>

    <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
    <script src="assets/plugins/materialize/js/materialize.min.js"></script>
    <script src="assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/pages/table-data.js"></script>
    <script src="assets/js/pages/form_elements.js"></script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>