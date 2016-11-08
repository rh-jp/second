<?php $__env->startSection('content'); ?>
    <div class="container">

        <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-heading" style="background: rgba(146, 88, 162, 0.78); color: white;">
            <strong>Let op! Private Servers staan niet vermeldt in deze lijst</strong>
            
            <div class="text" style="padding-top : 10px; font-weight: 200;">
            <p>In deze lijst kun je controleren of de website die gehost wordt door Realhosting, binnenkort gemigreerd wordt naar een nieuwe server omgeving. Het is van belang om de domeinnaam correct in te vullen. <br> <br> Indien de door jou ingevulde domeinnaam niet gevonden wordt,  wordt je website niet gemigreerd. <br> Hou er rekening mee dat Private Servers niet in dit overzicht staan. <br><br> Mocht je onverhoopt toch nog vragen hebben dan kun je contact op nemen met de  <a style="color:white;" href="mailto:servicedesk@realhosting.nl"><strong>servicedesk@realhosting.nl</strong></a></p>
            </div>
        </div>
        </div>

        <div class="col-sm-offset-2 col-sm-8">

            <div class="panel panel-default">
                <div class="panel-heading">
                    Controleer of je website binnenkort wordt gemigreerd
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
</div>
</div>

           


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>