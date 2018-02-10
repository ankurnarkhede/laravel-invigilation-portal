<?php $__env->startSection('title'); ?>
    Add User | SGGSIE&T Invigilation
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <?php echo $__env->make('message_block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>

    
    <div class="row no-m-t no-m-b">
        <div class="col s12 m12 l12">
            <div class="row card darken-1 card_form_padding">
                <h5 class="text_center">Add User</h5>
                <span></span>
                <form class="col s12" action="<?php echo e(route('add_user')); ?>" enctype="multipart/form-data" method="POST" >

                    <div class="bottom0 row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">account_circle</i>
                            <input name="name" id="name" type="text" class="validate" required="required">
                            <label for="name">Name</label>
                        </div>
                    </div>

                    <div class="bottom0 row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">email</i>
                            <input name="email" id="email" type="text" class="validate" required="required">
                            <label for="email">Email</label>
                        </div>
                    </div>

                    <div class="bottom0 row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">security</i>
                            <input name="password" id="password" type="text" class="validate" required="required">
                            <label for="password">Password</label>
                        </div>
                    </div>


                    <div class="bottom0 row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">list</i>
                            <select name="select_type" required="required"  >
                                <option value=""  selected>Select Type</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>

                            </select>
                            <label>Admin/User</label>
                        </div>
                    </div>


                    <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">

                    <button class="btn waves-effect waves-light" type="submit" name="add_user">Add User
                        <i class="material-icons">person_add</i>
                    </button>
                </form>
            </div>

        </div>
    </div>

    

    
    <div class="row no-m-t no-m-b">

        <div class="col s12 m12 l12">
            <div class="card">
                <div class="card-content">
                    <h5 class="text_center">User Log</h5>
                    <br>
                    <table id="example" class="display responsive-table datatable-example">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Status</th>
                            


                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Status</th>
                            

                        </tr>
                        </tfoot>


                        <tbody>

                        <?php
                        $count=0;
                        ?>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            $count++;
                            ?>
                            <tr>
                                <td><?php echo $count ?></td>
                                <td><?php echo e($u->name); ?></td>
                                <td><?php echo e($u->email); ?></td>
                                <td><?php echo e($u->type); ?></td>
                                <td style="font-weight: bold;">
                                    <form method="post" action="<?php echo e(route('user-status')); ?>">
                                        <input type="text" name="user_id" id="user_id" class="display_none" value="<?php echo e($u->id); ?>">
                                        <input type="text" name="user_status" id="user_status" class="display_none" value="<?php echo e($u->status); ?>">

                                        <?php if(  $u->status !=0): ?>
                                            <span class="green-text ">Approved</span>
                                            <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">

                                            <button class="btn waves-effect waves-light" type="submit" name="approve_change">Disapprove</button>

                                        <?php else: ?>
                                            <span class="red-text ">Disapproved</span>
                                            <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">

                                            <button class="btn waves-effect waves-light" type="submit" name="approve_change">Approve</button>

                                        <?php endif; ?>

                                    </form>

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
        url_user_edit = '<?php echo e(route('user-edit')); ?>';
    </script>

    <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
    <script src="assets/plugins/materialize/js/materialize.min.js"></script>
    <script src="assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/pages/table-data.js"></script>

    <script scr="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script scr="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
    <script scr="https://cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script>
    <script scr="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script scr="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script scr="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script scr="https://cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
    <script scr="https://cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>



    
    
    
    
    
    
    
    
    




<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>