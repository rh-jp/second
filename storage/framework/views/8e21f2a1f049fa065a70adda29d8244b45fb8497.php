<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">

            <div class="panel panel-default">
                <div class="panel-heading">
                    Controleer of uw domeinnaam binnenkort wordt verhuist
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->

                    <!-- New domain Form -->
                    <form action="" method="POST" class="form-horizontal">

                        <!-- domain Name -->
                        <div class="form-group">
                            <label for="domain-name" class="col-sm-3 control-label">Domein:</label>

                            <div class="col-sm-6">
                                <input type="text" name="q" id="domain-name" class="form-control" value="">
                            </div>
                        </div>

                       

                        <!-- Add domain Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Domeinnaam zoeken
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="">
                    <?php if(isset($details)): ?>
                    <p> De zoekresultaten: <b> <?php echo e($query); ?> </b> zijn :</p>
                    <h2>Overzicht migratie</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>vpsID</th>
                                <th>Datum</th>
                                <th>Status</th>
                                <th>Notitie</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($details as $result): ?>
                            <tr>
                                <td><?php echo e($result->domain); ?></td>
                                <td><?php echo e($result->vps); ?></td>
                                <td><?php echo e($result->datum); ?></td>
                                <td><?php echo e($result->currentstatus); ?></td>
                                <td><?php echo e($result->klant_opmerking); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        
                    </table>
                    <?php elseif(isset($message)): ?>
                    <p><?php echo e($message); ?></p>
                    <?php endif; ?>
                </div>


                </div>
            </div>


           


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>