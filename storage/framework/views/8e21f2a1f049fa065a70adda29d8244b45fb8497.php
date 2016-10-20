<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">

            <div class="panel panel-default">
                <div class="panel-heading">
                    Controleer of uw website binnenkort wordt gemigreerd
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->

                    <!-- New domain Form -->
                    <form action="" method="POST" class="form-horizontal">

                        <!-- domain Name -->

                

                        <div class="input-group">
                        <div class="input-group-btn search-panel">
                            <button type="button" class="btn btn-default" disabled="">
                                <span id="search_concept">www.</span> <span class="caret" style="margin-left: 5px;"></span>
                            </button>
                        </div>
                        <input type="hidden" name="search_param" value="all" id="search_param">         
                        <input type="text" class="form-control" name="q" placeholder="Zoek domeinnaam...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                        </span>
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