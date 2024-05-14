<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Ajouter un nouveau lecteur</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="reader_add.php" enctype="multipart/form-data">
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
                    <label for="reder_category" class="col-sm-3 control-label">Categorie</label>

                    <div class="col-sm-9">
                      <select class="form-control" id="reader_category" name="reader_category" required>
                        <option value="" selected>- Select -</option>
                        <?php
                          $sql = "SELECT * FROM reader_category";
                          $query = $conn->query($sql);
                          while($row = $query->fetch_array()){
                            echo "
                              <option value='".$row['reader_category_id']."'>".$row['name_category_reader']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="book_quota" class="col-sm-3 control-label">Quota du livre</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="book_quota" name="book_quota" required>
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
              <form class="form-horizontal" method="POST" action="reader_edit.php">
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
                    <label for="reader_category" class="col-sm-3 control-label">Categorie de lecteur</label>

                    <div class="col-sm-9">
                      <select class="form-control" id="reader_category" name="reader_category" required>
                        <option value="" selected id="sel_reader_category"></option>
                        <?php
                          $sql = "SELECT * FROM reader_category";
                          $query = $conn->query($sql);
                          while($row = $query->fetch_array()){
                            echo "
                              <option value='".$row['reader_category_id']."'>".$row['name_category_reader']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_book_quota" class="col-sm-3 control-label">Quota du livre</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_book_quota" name="book_quota">
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
              <form class="form-horizontal" method="POST" action="reader_delete.php">
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
              <form class="form-horizontal" method="POST" action="reader_edit_photo.php" enctype="multipart/form-data">
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


     