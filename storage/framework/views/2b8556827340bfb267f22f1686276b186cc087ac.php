<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form">
            <div class="form-group">
              <label class="control-label col-sm-2" for="id">Domeinnaam:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="<?php echo e($domain->name); ?>" value="<?php echo e($domain->name); ?>" disabled>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="id">VPS ID:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="<?php echo e($domain->vpsid); ?>" value="<?php echo e($domain->vpsid); ?>" disabled>
              </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-sm-2" for="name">Status:</label>
              <div class="col-sm-10">
                <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Ingepland
                <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li ><a href="#">Afgerond</a></li>
                  <li><a href="#">Migratie in gang</a></li>
                  <li><a href="#">Fout</a></li>
                </ul>
              </div>
              </div>
            </div>
          </form>
          <div class="modal-footer">
            <button type="button" class="btn-success btn actionBtn" data-dismiss="modal">
                                                    <i class="fa fa-btn fa-trash"></i>Aanpassen
            </button>
            <button type="button" class="btn btn-warning" data-dismiss="modal">
              <span class='glyphicon glyphicon-remove'></span> Sluiten
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>