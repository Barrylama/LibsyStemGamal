<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Emprunt d'une revue</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="borrow_add.php">
          		  <div class="form-group">
                  	<label for="lecteur" class="col-sm-3 control-label">Lecteur ID</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="lecteur" name="lecteur" required>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="isbn" class="col-sm-3 control-label">Numero de revue</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="isbn" name="isbn[]" required>
                    </div>
                </div>
                <span id="append-div"></span>
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                      <button class="btn btn-primary btn-xs btn-flat" id="append"><i class="fa fa-plus"></i> Champ de revue</button>
                    </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
            	<button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Enregistrer</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Add Consultation -->
<div class="modal fade" id="consultation_addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Consultation d'une revue</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="consultation_borrow_add.php">
          		  <div class="form-group">
                  	<label for="lecteur" class="col-sm-3 control-label">Lecteur ID</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="lecteur" name="lecteur" required>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="isbn" class="col-sm-3 control-label">Numero de revue</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="isbn" name="isbn[]" required>
                    </div>
                </div>
                <span id="consultation_append-div"></span>
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                      <button class="btn btn-primary btn-xs btn-flat" id="consultation_append"><i class="fa fa-plus"></i> Champ de livre</button>
                    </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
            	<button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Enregistrer</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Return -->
<div class="modal fade" id="return-btn">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Retour Revue...</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="return_consultation_review.php">
                    <input type="hidden" class="consultationReviewId" name="consultation_review_id">
                    <div class="text-center">
                        <p>Retourner la revue</p>
                        <h2 class="return_book bold"></h2>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Annuler</button>
                <button type="submit" class="btn btn-danger btn-flat" name="return_consultation"><i class="fa fa-trash"></i> Retourner</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Return book -->
<div class="modal fade" id="return-review-btn">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Retour Revue...</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="return_borrow_review.php">
                    <input type="hidden" class="borrowReviewId" name="borrow_review_id">
                    <div class="text-center">
                        <p>Retourner le livre</p>
                        <h2 class="return_book bold"></h2>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Annuler</button>
                <button type="submit" class="btn btn-danger btn-flat" name="return_borrow"><i class="fa fa-trash"></i> Retourner</button>
                </form>
            </div>
        </div>
    </div>
</div>

