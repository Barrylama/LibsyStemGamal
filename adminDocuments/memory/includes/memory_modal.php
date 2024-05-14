<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Ajout d'une memoire</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="memory_add.php"enctype="multipart/form-data">
              <div class="form-group">
                    <label for="faculte" class="col-sm-3 control-label">Faculé</label>

                    <div class="col-sm-8">
                      <select class="form-control" name="faculte" id="faculte" required>
                        <option value="" selected>- Veuillez selectionnez une option -</option>
                        <?php
                          $sql = "SELECT * FROM faculty";
                          $query = $conn->query($sql);
                          while($crow = $query->fetch_assoc()){
                            echo "
                              <option value='".$crow['faculty_id']."'>".$crow['name_faculty']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="category" class="col-sm-3 control-label">Categorie</label>

                    <div class="col-sm-8">
                      <select class="form-control" name="category" id="category" required>
                        <option value="" selected>- Veuillez selectionnez une option -</option>
                        <?php
                          $sql = "SELECT * FROM memory_category";
                          $query = $conn->query($sql);
                          while($crow = $query->fetch_assoc()){
                            echo "
                              <option value='".$crow['memory_category_id']."'>".$crow['name_category_memory']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>
          		  <div class="form-group">
                  	<label for="isbn" class="col-sm-3 control-label">Numero de la memoire</label>

                  	<div class="col-sm-8">
                    	<input type="text" class="form-control" id="isbn" name="isbn" required>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="titre" class="col-sm-3 control-label">Titre</label>

                    <div class="col-sm-8">
                      <textarea class="form-control" name="titre" id="titre" required></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="auteur" class="col-sm-3 control-label">Auteur</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="author" name="auteur">
                    </div>
                </div>
                <div class="form-group">
                    <label for="datepicker_add" class="col-sm-3 control-label">Date de publication</label>

                    <div class="col-sm-8">
                      <div class="date">
                        <input type="date" class="form-control" id="datepicker_add" name="pub_date">
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="NBexemplaire" class="col-sm-3 control-label">Nombre d'exemplaires</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="NBexemplaire" name="NBexemplaire">
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Description</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" name="description" id="description" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo de la couverture</label>

                    <div class="col-sm-8">
                      <input type="file" id="post_photo" name="photo">
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
            	<h4 class="modal-title"><b>Modification d'une memoire</b></h4>
          	</div>
          	<div class="modal-body">
            <form class="form-horizontal" method="POST" action="memory_edit.php">
            <input type="hidden" class="memoryId" name="memory_id">
              <div class="form-group">
                    <label for="faculte" class="col-sm-3 control-label">Faculé</label>

                    <div class="col-sm-8">
                      <select class="form-control" name="faculte" id="edit_faculte" required>
                        <option value="" selected id="sel_faculte_memory">- Selectionnez une option -</option>
                        <?php
                          $sql = "SELECT * FROM faculty";
                          $query = $conn->query($sql);
                          while($crow = $query->fetch_assoc()){
                            echo "
                              <option value='".$crow['faculty_id']."'>".$crow['name_faculty']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="category" class="col-sm-3 control-label">Categorie</label>

                    <div class="col-sm-8">
                      <select class="form-control" name="category" id="edit_category" required>
                        <option value="" selected id="sel_category_memory">- Selectionnez une option -</option>
                        <?php
                          $sql = "SELECT * FROM memory_category";
                          $query = $conn->query($sql);
                          while($crow = $query->fetch_assoc()){
                            echo "
                              <option value='".$crow['memory_category_id']."'>".$crow['name_category_memory']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>
          		  <div class="form-group">
                  	<label for="isbn" class="col-sm-3 control-label">Numero de la memoire</label>

                  	<div class="col-sm-8">
                    	<input type="text" class="form-control" id="edit_isbn" name="isbn" required>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="titre" class="col-sm-3 control-label">Theme</label>

                    <div class="col-sm-8">
                      <textarea class="form-control" name="titre" id="edit_titre" required></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="auteur" class="col-sm-3 control-label">Auteur</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="edit_author" name="auteur">
                    </div>
                </div>
                <div class="form-group">
                    <label for="datepicker_add" class="col-sm-3 control-label">Date de publication</label>

                    <div class="col-sm-8">
                      <div class="date">
                        <input type="date" class="form-control" id="edit_datepicker_add" name="pub_date">
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="NBexemplaire" class="col-sm-3 control-label">Nombre d'exemplaires</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="edit_NBexemplaire" name="NBexemplaire">
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Description</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" name="description" id="edit_description" required></textarea>
                    </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
            	<button type="submit" class="btn btn-primary btn-flat" name="edit"><i class="fa fa-save"></i> Enregistrer</button>
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
                  <span aria-hidden="false">&times;</span></button>
              <h4 class="modal-title"><b><span class="del_stu"></span></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="memory_edit_photo.php" enctype="multipart/form-data">
              <input type="hidden" class="memoryId" name="id">
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo de la couverture</label>

                    <div class="col-sm-8">
                      <input type="file" id="couv_photo" name="photo" required>
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
            	<form class="form-horizontal" method="POST" action="memory_delete.php">
            		<input type="hidden" class="memoryId" name="memory_id">
            		<div class="text-center">
	                	<p>SUPPRIMER LA MEMOIRE</p>
	                	<h2 class="del_memory bold"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Supprimer</button>
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
            	<h4 class="modal-title"><b>Vue d'une memoire</b></h4>
          	</div>
          	<div class="modal-body">
             <div class="row">
              <div class="col-md-5">
                <form class="form-horizontal">
                <input type="hidden" class="memoryId" name="memory_id">
                  <div class="form-group">
                    <label for="faculte" class="col-sm-3 control-label">Faculé</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="faculte" id="view_faculte" required disabled>
                        <option value="" selected id="view_faculte_memory">- Selectionnez une option -</option>
                        <?php
                          $sql = "SELECT * FROM faculty";
                          $query = $conn->query($sql);
                          while($crow = $query->fetch_assoc()){
                            echo "
                              <option value='".$crow['faculty_id']."'>".$crow['name_faculty']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="category" class="col-sm-3 control-label">Categorie</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="category" id="view_category " required disabled>
                        <option value="" selected id="view_category_memory" >- Selectionnez une option -</option>
                        <?php
                          $sql = "SELECT * FROM memory_category";
                          $query = $conn->query($sql);
                          while($crow = $query->fetch_assoc()){
                            echo "
                              <option value='".$crow['memory_category_id']."'>".$crow['name_category_memory']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>
          		  <div class="form-group">
                  	<label for="isbn" class="col-sm-3 control-label">ISBN</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="view_isbn" name="isbn" required disabled>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="titre" class="col-sm-3 control-label">Theme</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" name="titre" id="view_titre" required disabled></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="auteur" class="col-sm-3 control-label">Auteur</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="view_author" name="auteur" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="datepicker_add" class="col-sm-3 control-label">Date de publication</label>

                    <div class="col-sm-9">
                      <div class="date">
                        <input type="date" class="form-control" id="view_datepicker_add" name="pub_date" disabled>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="NBexemplaire" class="col-sm-3 control-label">Nombre d'exemplaires</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="view_NBexemplaire" name="NBexemplaire" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Description</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" name="description" id="view_description" required disabled></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-7">

            <div class="form-group">
                        <label for="photo" class="col-sm-40 control-label">Photo de couverture</label>
                        <div class="col-sm-70">
                            <img src="" alt="memory Cover" id="view_photo" style="width:100%;height:400px;" >
                        </div>
            </div>

          	</div>
                        

            </div>
            </div>

        </div>
    </div>
</div>

     