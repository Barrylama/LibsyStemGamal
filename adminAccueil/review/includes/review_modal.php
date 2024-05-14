
<!-- View -->
<div class="modal fade" id="view">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              	<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Vue d'une revue</b></h4>
          	</div>
          	<div class="modal-body">
             <div class="row">
              <div class="col-md-5">
                <form class="form-horizontal">
                <input type="hidden" class="reviewId" name="review_id">
                  <div class="form-group">
                    <label for="faculte" class="col-sm-3 control-label">Faculé</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="faculte" id="view_faculte" required disabled>
                        <option value="" selected id="view_faculte_review">- Selectionnez une option -</option>
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
                        <option value="" selected id="view_category_review" >- Selectionnez une option -</option>
                        <?php
                          $sql = "SELECT * FROM review_category";
                          $query = $conn->query($sql);
                          while($crow = $query->fetch_assoc()){
                            echo "
                              <option value='".$crow['review_category_id']."'>".$crow['name_category_review']."</option>
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
                    <label for="titre" class="col-sm-3 control-label">Titre</label>

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
                            <img src="" alt="review Cover" id="view_photo" style="width:100%;height:400px;" >
                        </div>
            </div>

          	</div>
                        

            </div>
            </div>

        </div>
    </div>
</div>

     