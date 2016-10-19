<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    Nieuwe domeinnaam voor migratie
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    <?php echo $__env->make('common.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <!-- New domain Form -->
                    <form action="<?php echo e(url('domain')); ?>" method="POST" class="form-horizontal">
                        <?php echo e(csrf_field()); ?>


                        <!-- domain Name -->
                        <div class="form-group">
                            <label for="domain-name" class="col-sm-3 control-label">Domein:</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="domain-name" class="form-control" value="<?php echo e(old('domain')); ?>">
                            </div>
                        </div>

                         <div class="form-group">
                            <label for="note" class="col-sm-3 control-label">Notitie</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" id="note" name="note" rows="3" value="<?php echo e(old('domain')); ?>"></textarea>
                            </div>
                         </div>

                         <div class="form-group">
                             <label for="date" class="col-sm-3 control label">Datum:</label>
                             <div class="col-sm-6">
                                 <input type="date" name="date" value="<?php echo e(old('date')); ?>">
                             </div>
                         </div>

                        <!-- Add domain Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Domeinnaam toevoegen
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <!-- Current domains -->
            <?php if(count($domains) > 0): ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                       Op de lijst voor de migratie
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped domain-table">
                            <thead>
                                <th>Domein</th>
                                <th>Datum</th>
                                <th>Status</th>
                                <th>&nbsp;</th>
                                <th>Huidge VPS</th>
                                <th>Opmerkingen</th>

                            </thead>
                            <tbody>
                                <?php foreach($domains as $domain): ?>
                                    <tr class="item<?php echo e($domain->id); ?>">
                                        <td class="table-text"><div><?php echo e($domain->name); ?></div></td>
                                        <td><?php echo e($domain->date); ?></td>
                                     
                                        <td class="<?php echo e($domain->id); ?>">
                                          <button type="button" class="btn btn-primary edit-modal" data-toggle="modal" data-id="<?php echo e($domain->id); ?>" data-name="<?php echo e($domain->id); ?>" data-target="#myModal">Ingepland</button>
                                            <?php echo $__env->make('button.button', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                                        </td>
                                        <td>
                                            <form action="<?php echo e(url('domain/'.$domain->id)); ?>" method="POST">
                                                <?php echo e(csrf_field()); ?>

                                                <?php echo e(method_field('DELETE')); ?>


                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Verwijderen
                                                </button>
                                            </form>
                                        </td>
                                        <td> <strong style="text-transform: uppercase;"><?php echo e($domain->vpsid); ?></strong></td>
                                        <td><?php echo e($domain->note); ?></td>

                                           <!-- domain Delete Button -->
                                    </tr>

                                <?php endforeach; ?>
                            </tbody>
                        </table>


                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

   <script>
     $(document).on('click', '.edit-modal', function() {
        $('#footer_action_button').text(" Update");
        // $('#footer_action_button').addClass('glyphicon-check');
        // $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').addClass('edit');
        $('.modal-title').text('Edit');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        $('#fid').val($(this).data('id'));
        $('#n').val($(this).data('name'));
        $('#myModal').modal('show');
    });

    $(document).on('click', '.delete-modal', function() {
        $('#footer_action_button').text(" Delete");
        $('#footer_action_button').removeClass('glyphicon-check');
        $('#footer_action_button').addClass('glyphicon-trash');
        $('.actionBtn').removeClass('btn-success');
        $('.actionBtn').addClass('btn-danger');
        $('.actionBtn').addClass('delete');
        $('.modal-title').text('Delete');
        $('.did').text($(this).data('id'));
        $('.deleteContent').show();
        $('.form-horizontal').hide();
        $('.dname').html($(this).data('name'));
        $('#myModal').modal('show');
    });

    $('.modal-footer').on('click', '.edit', function() {

        $.ajax({
            type: 'post',
            url: '/editItem',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#fid").val(),
                'name': $('#n').val()
            },
            success: function(data) {
                $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "' ><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
            }
        });
    });
    $("#add").click(function() {

        $.ajax({
            type: 'post',
            url: '/addItem',
            data: {
                '_token': $('input[name=_token]').val(),
                'name': $('input[name=name]').val()
            },
            success: function(data) {
                if ((data.errors)){
                    $('.error').removeClass('hidden');
                    $('.error').text(data.errors.name);
                }
                else {
                    $('.error').remove();
                    $('#table').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                }
            },

        });
        $('#name').val('');
    });
    $('.modal-footer').on('click', '.delete', function() {
        $.ajax({
            type: 'post',
            url: '/deleteItem',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.did').text()
            },
            success: function(data) {
                $('.item' + $('.did').text()).remove();
            }
        });
    });
   </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>