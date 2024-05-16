<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Ajouter un nouveau lecteur Particulier</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="reader_particulier_add.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="reader_firstname" class="col-sm-3 control-label">Prenom</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="reader_firstname" name="reader_firstname" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="reader_lastname" class="col-sm-3 control-label">Nom</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="reader_lastname" name="reader_lastname" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="reader_phone" class="col-sm-3 control-label">Telephone</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="reader_phone" name="reader_phone">
                    </div>
                </div>
                <div class="form-group">
                    <label for="reader_address" class="col-sm-3 control-label">Adresse</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="reader_address" name="reader_address">
                    </div>
                </div>
                <div class="form-group">
                    <label for="reader_gender" class="col-sm-3 control-label">Genre</label>

                    <div class="col-sm-9">
                      <select class="form-control" id="reader_gender" name="reader_gender" required>
                        <option value="" selected>- Selectionner -</option>
                        <?php
                          $sql = "SELECT * FROM gender";
                          $query = $conn->query($sql);
                          while($row = $query->fetch_array()){
                            echo "
                              <option value='".$row['gender_id']."'>".$row['gender_name']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="Profession" class="col-sm-3 control-label">Profession</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="Profession" name="Profession" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Identite" class="col-sm-3 control-label">Numero pièce d'identité</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="Identite" name="Identite" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo">
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

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Modification d'un lecteur</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="reader_particulier_edit.php">
                <input type="hidden" class="readId" name="reader_id">
                <div class="form-group">
                    <label for="edit_firstname" class="col-sm-3 control-label">Prenom</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_firstname" name="firstname">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_lastname" class="col-sm-3 control-label">Nom</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_lastname" name="lastname">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_reader_phone" class="col-sm-3 control-label">Telephone</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_reader_phone" name="reader_phone" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_reader_address" class="col-sm-3 control-label">Adresse</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_reader_address" name="reader_address" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="reader_gender" class="col-sm-3 control-label">Genre</label>

                    <div class="col-sm-9">
                      <select class="form-control" id="reader_gender" name="reader_gender" required>
                        <option value="" selected id="sel_reader_gender"></option>
                        <?php
                          $sql = "SELECT * FROM gender";
                          $query = $conn->query($sql);
                          while($row = $query->fetch_array()){
                            echo "
                              <option value='".$row['gender_id']."'>".$row['gender_name']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="edit_Profession" class="col-sm-3 control-label">Profession</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_Profession" name="Profession">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_Identite" class="col-sm-3 control-label">Numero pièce d'identité</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_Identite" name="Identite">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Mis à jour</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Suppression...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="reader_particulier_delete.php">
                <input type="hidden" class="readId" name="reader_id">
                <div class="text-center">
                    <p>SUPPRIMER LE LECTEUR</p>
                    <h2 class="del_stu bold"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Annuler</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Supprimer</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Update Photo -->
<div class="modal fade" id="edit_photo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="del_stu"></span></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="reader_particulier_edit_photo.php" enctype="multipart/form-data">
                <input type="hidden" class="readId" name="id">
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
              <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Mettre à jour</button>
              </form>
            </div>
        </div>
    </div>
</div>


<!-- View -->
<div class="modal fade" id="view">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              	<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Vue d'un lecteur Particulier</b></h4>
          	</div>
          	<div class="modal-body">
             <div class="row">
              <div class="col-md-5">
                <form class="form-horizontal">
                <input type="hidden" class="readId" name="reader_id">
                  
              
          		  <div class="form-group">
                  	<label for="firstname" class="col-sm-3 control-label">Prenom</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="view_firstname" name="isbn" required disabled>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="titre" class="col-sm-3 control-label">Nom</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="titre" id="view_lastname" required disabled></input>
                    </div>
                </div>
               

                
                <div class="form-group">
                    <label for="Telephone" class="col-sm-3 control-label">Telephone</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" name="Telephone" id="view_reader_phone" required disabled></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="Adresse" class="col-sm-3 control-label">Adresse</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" name="Adresse" id="view_reader_address" required disabled></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="faculte" class="col-sm-3 control-label">Genre</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="faculte" id="view_faculte" required disabled>
                        <option value="" selected id="view_reader_gender">- Selectionnez une option -</option>
                        <?php
                          $sql = "SELECT * FROM gender";
                          $query = $conn->query($sql);
                          while($crow = $query->fetch_assoc()){
                            echo "
                              <option value='".$crow['gender_id']."'>".$crow['gender_name']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Profession" class="col-sm-3 control-label">Profession</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="view_Profession" name="Profession" disabled>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="Identite" class="col-sm-3 control-label">Numero pièce d'identité</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="view_Identite" name="Identite" disabled>
                    </div>
                </div>
            </div>
            <div class="col-md-7">

            <div class="form-group">
                        <label for="photo" class="col-sm-40 control-label">Photo du lecteur</label>
                        <div class="col-sm-70">
                            <img src="" alt="Etudiant Cover" id="reader_photo" style="width:100%;height:400px;" >
                        </div>
            </div>

          	</div>
                        

            </div>
            </div>

        </div>
    </div>
</div>


     