<?php $__env->startSection('content'); ?>
    <div class="container">

        <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-heading" style="background: rgba(146, 88, 162, 0.78); color: white;">
            <strong>Opmerking:</strong>
            
            <div class="text" style="padding-top : 10px; font-weight: 200;">
            <p>
            Vul hieronder je domeinnaam in om te bekijken of jouw website binnenkort wordt omgezet naar onze nieuwste hosting. Voor meer informatie bezoek je <a style="color:white;" target="_blank" href="https://realhosting.nl/2016/10/verbeteringen-aan-onze-hosting/">https://realhosting.nl/2016/10/verbeteringen-aan-onze-hosting/</a></p>
            <p>
            Let op:

            <ul>
            <li>
            Als je een eigen server (private cloud) hebt, komt je website niet in het overzicht. We nemen dan contact met je op als dat nodig is. Nemen we geen contact op, dan wordt jouw server niet omgezet op kort termijn.
            </li>
            <li> Komt jouw website niet voor, dan wordt jouw website niet omgezet op kort termijn</li>
            </ul>
                
            </p>
            <p>Bij vragen neem je contact op met <a style="color:white;" href="mailto:servicedesk@realhosting.nl">servicedesk@realhosting.nl</a></p>
            
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